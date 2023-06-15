<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EvenementController extends Controller
{
    public $rules = [
        'title' => 'required|unique:evenements,title,',
        'content' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png,webp|max:4000',
    ];
    public $messages = [
        'title.required' => "le titre d'évenement est obligatoire veuillez le saisir.",
        'title.unique' => "Ce titre existe déjà veuillez saisir un autre.",
        'content.required' => "le contenu d'article est obligatoire veuillez le saisir.",
        'image.required' => "Veuillez choisir l'image d'article.",
        'image.mimes' => "JPG, JPEG, PNG et WEBP sont les formats d'images acceptés.",
        'image.max' => "la taille maximum de l'image est de 1024.",
    ];
    public function index()
    {
        return view('administration.ui.evenements.index');
    }


    public function create()
    {
        return view('administration.ui.evenements.create');
    }

    public function add(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages);
        if ($request->approved === null) {
            $validated['approved'] = 0;
        } else {
            $validated['approved'] = $request->approved !== null;
        }
        if ($request->readable === null) {
            $validated['readable'] = 0;
        } else {
            $validated['readable'] = $request->readable !== null;
        }

        if (!empty($request->input('tel'))){
            $validated['tel'] =$request->input('tel');
        }
        if (!empty($request->input('lieu'))){
            $validated['lieu'] =$request->input('lieu');
        }
        if (!empty($request->input('email'))){
            $validated['email'] =$request->input('email');
        }
        if (!empty($request->input('dat_event'))){
            $validated['dat_event'] =$request->input('dat_event');
        }

        $validated['user_id'] = auth()->id();
        //$validated['slug'] = Str::slug($request->title);

        $event = Evenement::create($validated);
        $return=response()->json(['code'=>1,'msg'=>"L'événement a été créé avec succès!"]);
        if ($request->has('image')) {
            $folder = 'events/';
            $file = $request->file('image');
            $filename=$file->getClientOriginalName();
            $new_file=time().'_'.$filename;

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $upload=Storage::disk('public')->put($folder.$new_file,(string) file_get_contents($file));
            $thumbnail_path=$folder.'thumbnails/';

            $this->ImageProcess($thumbnail_path, $folder, $new_file);

            if ($upload){
                $fileName = $new_file;
                $extension = $file->getClientOriginalExtension();
                $result=$event->image()->create([
                    'name' => $fileName,
                    'extension' => $extension,
                    'path' => $upload,
                ]);
                if ($result){
                    $return= response()->json(['code'=>1,'msg'=>"L'événement a été créé avec succès!"]);
                }else{
                    $return= response()->json(['code'=>3,'msg'=>"Oups! Désolé Quelque chose n'a pas bien fonctionné, réessayez!"]);
                }
            }else{
                $return= response()->json(['code'=>3,'msg'=>"Oups! Quelque chose n'a pas bien fonctionné, réessayez!"]);
            }
        }
        return $return;
    }

    public function edit(string $slug)
    {
        $event=Evenement::where('slug',$slug)->first();
        //dd($event);
        if (!$event){
            return abort(404);
        }
        //dd($post->category);
        return view('administration.ui.evenements.edit',[
            'event'=>$event
        ]);
    }

    public function update(Request $request, Evenement $event ): \Illuminate\Http\JsonResponse
    {
        //la maj de la photo n'est obligatoire

        $this->rules['image'] = 'nullable|file|mimes:jpeg,jpg,png,webp|max:1024';
        $this->rules['title'] = 'required|unique:evenements,title,'.$event->id;
        //dd($post);
        $validated = $request->validate($this->rules, $this->messages);
        if ($request->approved === null) {
            $validated['approved'] = 0;
        } else {
            $validated['approved'] = $request->approved !== null;
        }
        if ($request->readable === null) {
            $validated['readable'] = 0;
        } else {
            $validated['readable'] = $request->readable !== null;
        }

        if (!empty($request->input('tel'))){
            $validated['tel'] =$request->input('tel');
        }
        if (!empty($request->input('lieu'))){
            $validated['lieu'] =$request->input('lieu');
        }
        if (!empty($request->input('email'))){
            $validated['email'] =$request->input('email');
        }
        if (!empty($request->input('dat_event'))){
            $validated['dat_event'] =$request->input('dat_event');
        }

        $validated['user_id'] = auth()->id();

        $event->update($validated);
        $return=response()->json(['code'=>1,'msg'=>"L'événement a été mis à jour avec succès!"]);

        if ($request->has('image')) {
            $folder = 'events/';
            $thumbnail_path=$folder.'thumbnails/';
            $file = $request->file('image');
            $filename=$file->getClientOriginalName();
            $new_file=time().'_'.$filename;

            //suppression des anciennes images
            $deleteResized=$thumbnail_path.'resized_'.$event->image->name;
            $deleteThumb=$thumbnail_path.'thumb_'.$event->image->name;
            $deleteBan=$thumbnail_path.'banner_'.$event->image->name;
            $deletePath=$folder.$event->image->name;

            if (Storage::disk('public')->exists($deleteResized)) {
                Storage::disk('public')->delete($deleteResized);
            }
            if (Storage::disk('public')->exists($deleteThumb)) {
                Storage::disk('public')->delete($deleteThumb);
            }
            if (Storage::disk('public')->exists($deletePath)) {
                Storage::disk('public')->delete($deletePath);
            }
            if (Storage::disk('public')->exists($deleteBan)) {
                Storage::disk('public')->delete($deleteBan);
            }

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }
            $upload=Storage::disk('public')->put($folder.$new_file,(string) file_get_contents($file));


            $this->ImageProcess($thumbnail_path, $folder, $new_file);

            if ($upload){
                $fileName = $new_file;
                $extension = $file->getClientOriginalExtension();
                $result=$event->image()->update([
                    'name' => $fileName,
                    'extension' => $extension,
                    'path' => $upload,
                ]);
                if ($result){
                    $return=response()->json(['code'=>1,'msg'=>"L'Evénement a été mis à jour avec succès!"]);
                }else{
                    $return=response()->json(['code'=>3,'msg'=>"Oups! Désolé Quelque chose n'a pas bien fonctionné, réessayez!"]);
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
            ->fit(200, 200)
            ->save(storage_path('app/public/' . $thumbnail_path . 'thumb_' . $new_file));
        //resized image
        Image::make(storage_path('app/public/' . $folder . $new_file))
            ->fit(500, 350)
            ->save(storage_path('app/public/' . $thumbnail_path . 'resized_' . $new_file));

        Image::make(storage_path('app/public/' . $folder . $new_file))
            ->fit(1800, 980)
            ->save(storage_path('app/public/' . $thumbnail_path . 'banner_' . $new_file));
    }
}
