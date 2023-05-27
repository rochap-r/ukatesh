<?php

namespace App\Http\Livewire\Ui\Admin\Ranks;

use Livewire\Component;

class Config extends Component
{

    public $config;
    public $name,$tel,$email,$address,$description,$visionTitle,$visionContent,$missionTitle,$memberTitle,$missionContent,$memberContent;
    public function mount(){
        $this->config=\App\Models\Rank::find(1);
        $this->name=$this->config->name;
        $this->email=$this->config->email;
        $this->tel=$this->config->tel;
        $this->address=$this->config->address;
        $this->visionTitle=$this->config->visionTitle;
        $this->missionTitle=$this->config->missionTitle;
        $this->memberTitle=$this->config->memberTitle;
        $this->missionContent=$this->config->missionContent;
        $this->visionContent=$this->config->visionContent;
        $this->memberContent=$this->config->memberContent;
        $this->description=$this->config->description;
    }
    public function updateConfig(){
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'tel'=>'required',
            'email'=>'required | email',
            'address'=>'required',
            'visionTitle'=>'required',
            'missionTitle'=>'required',
            'memberTitle'=>'required',
            'missionContent'=>'required',
            'visionContent'=>'required',
            'memberContent'=>'required',

        ],[
            'name.required'=>'Le nom du site est obligatoire veuillez le saisir!',
            'visionTitle.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'missionTitle.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'memberTitle.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'missionContent.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'visionContent.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'memberContent.required'=>'Cette section doit avoir un titre c\'est obligatoire veuillez le saisir!',
            'tel.required'=>'Le numero du téléphone de l\'ONG est obligatoire veuillez le saisir!',
            'email.required'=>'L\'email de l\'ONG, est obligatoire veuillez le saisir!',
            'address.required'=>'L\'adresse de l\'ONG, est obligatoire veuillez la saisir!',
            'email.email'=>'Saisissez une adresse email valide!',
            'description.required'=>'La description du site est obligatoire veuillez le saisir!',
        ]);
        $data=$this->getDataForValidation([
            'name'=>'required',
            'description'=>'required',
            'visionTitle'=>'required',
            'missionTitle'=>'required',
            'memberTitle'=>'required',
            'memberContent'=>'required',
            'misionContent'=>'required',
            'missionContent'=>'required',
            'tel'=>'required',
            'email'=>'required | email',
            'address'=>'required',
        ]);

        $update=$this->config->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'missionTitle'=>$this->missionTitle,
            'memberTitle'=>$this->memberTitle,
            'memberContent'=>$this->memberContent,
            'missionContent'=>$this->missionContent,
            'visionContent'=>$this->visionContent,
            'tel'=>$this->tel,
            'address'=>$this->address,
            'description'=>$this->description,
        ]);

        if($update){
            $this->showToastr('les informations de la fondation ont été mis à jour avez succès.','success');
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
        return view('livewire.ui.admin.ranks.config');
    }
}
