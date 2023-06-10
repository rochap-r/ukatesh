<?php

namespace App\Http\Livewire\Ui\Admin\Rank;

use App\Models\Rank;
use Livewire\Component;

class Condition extends Component
{
    public $rank;
    public $condition,$aboutHome;

    public function mount(){
        $this->rank=Rank::find(1);
        $this->condition=$this->rank->condition;
        $this->aboutHome=$this->rank->aboutHome;
    }
    public function updateCondition(){
        $this->validate([
            'condition'=>'required',
            'aboutHome'=>'required',
        ],[
            'condition.required'=>'La condition d\'adhésion est obligatoire veuillez la saisir!',
            'aboutHome.required'=>'Ce texte de présentation est obligatoire veuillez la saisir!',
        ]);
        $data=$this->getDataForValidation([
            'condition'=>'required',
            'aboutHome'=>'required',
        ]);

        $update=$this->rank->update([
            'condition'=>$this->condition,
            'aboutHome'=>$this->aboutHome,
        ]);

        if($update){
            $this->showToastr('Mise à jour effectuée succès.','success');
        }else{
            $this->showToastr('Oups! Désolé quelque chose n\'a pas bien marché veuillez réessayer','error');
        }

    }

    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }


    public function render()
    {
        return view('livewire.ui.admin.rank.condition');
    }
}
