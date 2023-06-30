<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    public $rules = [
        'title' => 'required|unique:posts,title,',
        'body' => 'required',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|mimes:jpeg,jpg,png,webp|max:4100',
    ];
    public $messages = [
        'title.required' => "le titre d'article est obligatoire veuillez le saisir.",
        'title.unique' => "Ce titre existe déjà veuillez saisir un autre.",
        'body.required' => "le contenu d'article est obligatoire veuillez le saisir.",
        'category_id.required' => "Vous devez selection une catégorie.",
        'image.required' => "Veuillez choisir l'image d'article.",
        'image.mimes' => "JPG, JPEG, PNG et WEBP sont les formats d'images acceptés.",
        'image.max' => "la taille maximum de l'image est de 4100.",
    ];

    public function index()
    {
        return view('administration.ui.posts.index');

    }

    public function create()
    {
        return view('administration.ui.posts.create');
    }

    public function add(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages);
        if ($request->approved === null) {
            $validated['approved'] = 0;
        } else {
            $validated['approved'] = $request->approved !== null;
        }

        $validated['user_id'] = auth()->id();
        //$validated['slug'] = Str::slug($request->title);

        $post = Post::create($validated);
        $return=response()->json(['code'=>1,'msg'=>"L'article a été créé avec succès!"]);
        if ($request->has('image')) {
            $folder = 'posts/';
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
                $result=$post->image()->create([
                    'name' => $fileName,
                    'extension' => $extension,
                    'path' => $upload,
                ]);
                if ($result){
                    $return= response()->json(['code'=>1,'msg'=>"L'article a été créé avec succès!"]);
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
        $post=Post::where('slug',$slug)->first();
        if (!$post){
            return abort(404);
        }
        //dd($post->category);
        return view('administration.ui.posts.edit',[
            'post'=>$post
        ]);
    }

    public function update(Request $request, Post $post ): \Illuminate\Http\JsonResponse
    {
        //la maj de la photo n'est obligatoire

        $this->rules['image'] = 'nullable|file|mimes:jpeg,jpg,png,webp|max:1024';
        $this->rules['title'] = 'required|unique:posts,title,'.$post->id;
        //dd($post);
        $validated = $request->validate($this->rules, $this->messages);
        if ($request->approved === null) {
            $validated['approved'] = 0;
        } else {
            $validated['approved'] = $request->approved !== null;
        }

        $validated['user_id'] = auth()->id();

        $post->update($validated);
        $return=response()->json(['code'=>1,'msg'=>"L'article a été mis à jour avec succès!"]);

        if ($request->has('image')) {
            $folder = 'posts/';
            $thumbnail_path=$folder.'thumbnails/';
            $file = $request->file('image');
            $filename=$file->getClientOriginalName();
            $new_file=time().'_'.$filename;

            //suppression des anciennes images
            $deleteResized=$thumbnail_path.'resized_'.$post->image->name;
            $deleteThumb=$thumbnail_path.'thumb_'.$post->image->name;
            $deletePath=$folder.$post->image->name;

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
                $result=$post->image()->update([
                    'name' => $fileName,
                    'extension' => $extension,
                    'path' => $upload,
                ]);
                if ($result){
                    $return=response()->json(['code'=>1,'msg'=>"L'article a été mis à jour avec succès!"]);
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
            ->fit(840, 450)
            ->save(storage_path('app/public/' . $thumbnail_path . 'resized_' . $new_file));
    }
}
