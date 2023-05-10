<?php

namespace App\Http\Livewire\Ui\Admin\Evenements;

use App\Models\Evenement;
use Livewire\Component;
use Livewire\WithPagination;

class EvenementIndex extends Component
{
    use WithPagination;
    public $perpage=16;
    public $orderBy='desc';
    public $search=null;
    public $author=null;

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
}
