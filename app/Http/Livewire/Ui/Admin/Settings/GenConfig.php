<?php

namespace App\Http\Livewire\Ui\Admin\Settings;

use Livewire\Component;

class GenConfig extends Component
{
    public $settings;
    public $sitename,$phone,$email,$adress,$description,$condition;
    public function mount(){
        $this->settings=\App\Models\GenConfig::find(1);
        $this->sitename=$this->settings->sitename;
        $this->email=$this->settings->email;
        $this->phone=$this->settings->phone;
        $this->adress=$this->settings->adress;
        $this->description=$this->settings->description;
    }
    public function updateGenConfig(){
        $this->validate([
            'sitename'=>'required',
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required | email',
            'adress'=>'required',
        ],[
            'sitename.required'=>'Le nom du site est obligatoire veuillez le saisir!',
            'phone.required'=>'Le numero du téléphone est obligatoire veuillez le saisir!',
            'email.required'=>'L\'email est obligatoire veuillez le saisir!',
            'adress.required'=>'L\'adresse physique est obligatoire veuillez la saisir!',
            'email.email'=>'Saisissez une adresse email valide!',
            'description.required'=>'La description du site est obligatoire veuillez le saisir!',
        ]);
        $data=$this->getDataForValidation([
            'sitename'=>'required',
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required | email',
            'adress'=>'required',
        ]);

        $update=$this->settings->update([
            'sitename'=>$this->sitename,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'adress'=>$this->adress,
            'description'=>$this->description,
        ]);

        if($update){
            $this->showToastr('les informations de paramètres généraux ont été mis à jour avez succès.','success');
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
        return view('livewire.ui.admin.settings.gen-config');
    }
}
