<?php

namespace App\Http\Livewire\Ui\Admin\Evenements;

use App\Models\Evenement;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class EvenementIndex extends Component
{
    use WithPagination;
    public $perpage=16;
    public $orderBy='desc';
    public $search=null;
    public $author=null;

    protected $listeners=[
        'deleteEventAction'
    ];

    public function mount()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //dd(Evenement::find(1)->image);
        return view('livewire.ui.admin.evenements.evenement-index',[
            'events'=>Evenement::search(trim($this->search))
                ->when($this->author,function ($query){
                    $query->where('user_id',$this->author);
                })
                ->when($this->orderBy,function ($query){
                    $query->orderBy('id',$this->orderBy);
                })
                ->paginate($this->perpage),
        ]);
    }

    public function deleteEvent(int $id)
    {
        $event=Evenement::find($id);
        //lancement de la boite de confirmation
        $this->dispatchBrowserEvent('deleteEvent',[
            'title'=>'Etes-vous vraiment sure de supprimer cet article?',
            'html'=>"Suppression de l'Article: ".$event->title,
            'id'=>$event->id

        ]);
    }

    public function deleteEventAction(int $id)
    {
        $event=Evenement::find($id);
        //dd($event);
        $folder = 'events/';
        $thumbnail_path=$folder.'thumbnails/';
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
        $event->delete();
        $this->showToastr("l'article a été supprimé avec succès.", 'info');
    }

    private function showToastr(string $message, string $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
