<?php

namespace App\Http\Livewire\Ui\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $perpage=16;
    public $orderBy='desc';
    public $search=null;
    public $category=null;
    public $author=null;
    protected $listeners=[
        'deletePostAction'
    ];


    public function mount()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCategory()
    {
        $this->resetPage();
    }
    public function updatingAuthor()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.ui.admin.posts.post-index',[
            'posts'=>Post::search(trim($this->search))
                ->when($this->category,function ($query){
                    $query->where('category_id',$this->category);
                })
                ->when($this->author,function ($query){
                    $query->where('user_id',$this->author);
                })
                ->when($this->orderBy,function ($query){
                    $query->orderBy('id',$this->orderBy);
                })
                ->paginate($this->perpage),
        ]);
    }

    public function deletePostAction(int $id)
    {
        $post=Post::find($id);
        $folder = 'posts/';
        $thumbnail_path=$folder.'thumbnails/';
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
        $post->delete();
        $this->showToastr("l'article a été supprimé avec succès.", 'info');
    }

    public function deletePost(int $id)
    {
        $post=Post::find($id);
        //lancement de la boite de confirmation
        $this->dispatchBrowserEvent('deletePost',[
            'title'=>'Etes-vous vraiment sure de supprimer cet article?',
            'html'=>"Suppression de l'Article: ".$post->title,
            'id'=>$post->id

        ]);
    }

    private function showToastr(string $message, string $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
