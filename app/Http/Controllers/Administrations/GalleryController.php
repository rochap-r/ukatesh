<?php

namespace App\Http\Controllers\Administrations;

use App\Models\Type;
use App\Models\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{ 
    public $rules=[
        'type' => 'required|exists:types,id',
        'title' => 'required',
        'file.*' => 'required|file|mimes:jpg,png,webp'
    ];
    public $messages=[
        'type.required' => "Veuillez selectionner le type.",
        'title.required' => "Ce titre est obligatoire veillez le saisir.",
        'file.required' => "Veuillez choisir une ou plusieurs images .",
        'file.mimes' => "JPG, JPEG, PNG et WEBP sont les formats d'images acceptés.",
    ];

    public function create()
    {   
        return view('administration.ui.galleries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules,$this->messages);

        if (!Storage::disk('public')->exists('galeries')) {
            Storage::disk('public')->makeDirectory('galeries');
        }

                

        if ($request->file('file')) {
            $folder = 'galeries/';
            $file = $request->file('file');
            $filename=$file->getClientOriginalName();
            $new_file=time().'_'.$filename;
            
            $upload=Storage::disk('public')->put($folder.$new_file,(string) file_get_contents($file));
            if($upload){
                $type = Type::find($validatedData['type']);
                $thumbnail_path=$folder.'thumbnails/';
                //dd($type);

                $this->ImageProcess($thumbnail_path, $folder, $new_file);

                $gallery = new Galery();
                $gallery->name = $new_file;
                $gallery->title = $validatedData['title'];
                $gallery->path = $upload;
                $gallery->extension = $file->getClientOriginalExtension();
                $gallery->type_id=$type->id;
                $result=$gallery->save();
                if ($result){
                    $return= response()->json(['code'=>1,'msg'=>"L'image de la galerie a été créée avec succès!"]);
                }else{
                    $return= response()->json(['code'=>3,'msg'=>"Oups! Désolé Quelque chose n'a pas bien fonctionné, réessayez!"]);
                }
            }else{
                $return= response()->json(['code'=>3,'msg'=>"Oups! Quelque chose n'a pas bien fonctionné, réessayez!"]);
            }
            return $return;
            
        }

        return response()->json(['code'=>1,'msg'=>"Les images ont été ajoutées dans la galérie avec succès!"]);
    }



    public function edit(int $galery_id)
    {
        $galery=Galery::find($galery_id);
        
        return view('administration.ui.galleries.edit',[
            'galery'=>$galery
        ]);
    }
    public function index()
    {
        return view('administration.ui.galleries.index',[
            'galeries'=>Galery::orderBy('type_id','DESC')->paginate('12'),
        ]);
    }



    public function update(Request $request, int $id ): \Illuminate\Http\JsonResponse
    {
        //la maj de la photo n'est obligatoire

        $this->rules['file'] = 'nullable|file|mimes:jpeg,jpg,png,webp';

        //dd($post);
        $validated = $request->validate($this->rules, $this->messages);
        $gallery=Galery::find($id);
        //dd($gallery);

        if (!$request->has('file')) {
                $gallery->update([
                    'title'=>$validated['title'],
                    'type_id'=>$validated['type'],
                ]);
            $return=response()->json(['code'=>1,'msg'=>"Les infos de la galérie a été mis à jour avec succès!"]);
        }

        if ($request->has('file')) {
            $folder = 'galeries/';
            $thumbnail_path=$folder.'thumbnails/';
            $file = $request->file('file');
            $filename=$file->getClientOriginalName();
            $new_file=time().'_'.$filename;

            //suppression des anciennes images
            $deleteResized=$thumbnail_path.'resized_'.$gallery->name;
            $deleteThumb=$thumbnail_path.'thumb_'.$gallery->name;
            $deletePath=$folder.$gallery->name;

            if (Storage::disk('public')->exists($deleteResized)) {
                Storage::disk('public')->delete($deleteResized);
            }
            if (Storage::disk('public')->exists($deleteThumb)) {
                Storage::disk('public')->delete($deleteThumb);
            }
            if (Storage::disk('public')->exists($deletePath)) {
                Storage::disk('public')->delete($deletePath);
            }

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $upload=Storage::disk('public')->put($folder.$new_file,(string) file_get_contents($file));


            $this->ImageProcess($thumbnail_path, $folder, $new_file);

            if ($upload){
                $fileName = $new_file;
                $extension = $file->getClientOriginalExtension();
                $result=$gallery->update([
                    'name' => $fileName,
                    'extension' => $extension,
                    'path' => $upload,
                ]);
                if ($result){
                    $return=response()->json(['code'=>1,'msg'=>"L'image de la galérie a été mis à jour avec succès!"]);
                }else{
                    $return=response()->json(['code'=>3,'msg'=>"Oups! Désolé Quelque chose n'a pas bien fonctionné."]);
                }
            }else{
                $return=response()->json(['code'=>3,'msg'=>"Oups! Quelque chose n'a pas bien fonctionné, réessayez!"]);
            }


        }
        return $return;

    }



        /**
     * @param string $thumbnail_path
     * @param string $folder
     * @param string $new_file
     * @return void
     */
    public function ImageProcess(string $thumbnail_path, string $folder, string $new_file): void
    {
        if (!Storage::disk('public')->exists($thumbnail_path)) {
            Storage::disk('public')->makeDirectory($thumbnail_path);
        }
        //square thumbnail
        Image::make(storage_path('app/public/' . $folder . $new_file))
            ->fit(408, 200)
            ->save(storage_path('app/public/' . $thumbnail_path . 'thumb_' . $new_file));
        //resized image
        Image::make(storage_path('app/public/' . $folder . $new_file))
            ->fit(840, 450)
            ->save(storage_path('app/public/' . $thumbnail_path . 'resized_' . $new_file));
    }

}
