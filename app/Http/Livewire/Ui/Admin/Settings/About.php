<?php

namespace App\Http\Livewire\Ui\Admin\Settings;

use Livewire\Component;

class About extends Component
{

    public $abouts;
    public $about,$project,$galery;
    public function mount(){
        $this->abouts=\App\Models\About::find(1);
        $this->about=$this->abouts->about;
        $this->project=$this->abouts->project;
        $this->galery=$this->abouts->galery;
    }
    public function updateAbout(){
        $this->validate([
            'about'=>'required',
            'project'=>'required',
            'galery'=>'required',
        ],[
            'about.required'=>'Le Texte de la section Apropos est obligatoire veuillez le saisir!',
            'project.required'=>'Le Texte de la section Project est obligatoire veuillez le saisir!',
            'galery.required'=>'Le Texte descriptif de la gallérie est obligatoire veuillez le saisir!',
        ]);
        $data=$this->getDataForValidation([
            'about'=>'required',
            'project'=>'required',
            'galery'=>'required',
        ]);

        $update=$this->abouts->update([
            'about'=>$this->about,
            'project'=>$this->project,
            'galery'=>$this->galery,
        ]);

        if($update){
            $this->showToastr('les informations d\'à propos ont été mis à jour avez succès.','success');
            $this->emit('updateFooter');
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
        return view('livewire.ui.admin.settings.about');
    }
}
