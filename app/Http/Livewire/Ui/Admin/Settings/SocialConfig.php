<?php

namespace App\Http\Livewire\Ui\Admin\Settings;

use Livewire\Component;

class SocialConfig extends Component
{
    public $settings;
    public $facebook,$linkedin,$twitter,$youtube;
    public function mount(){
        $this->settings=\App\Models\GenConfig::find(1);
        $this->facebook=$this->settings->facebook;
        $this->youtube=$this->settings->youtube;
        $this->linkedin=$this->settings->linkedin;
        $this->twitter=$this->settings->twitter;

    }
    public function updateMedia(){
        $this->validate([
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'linkedin'=>'nullable|url',
            'youtube'=>'nullable|url',
        ],[
            'facebook.url'=>'Lien invalide, Saissez un lien valide',
            'twitter.url'=>'Lien invalide, Saissez un lien valide',
            'linkedin.url'=>'Lien invalide, Saissez un lien valide',
            'youtube.url'=>'Lien invalide, Saissez un lien valide',
        ]);
        $result=\App\Models\GenConfig::find(1)->update([
            'facebook'=>$this->facebook,
            'twitter'=>$this->twitter,
            'youtube'=>$this->youtube,
            'linkedin'=>$this->linkedin,
        ]);
        if($result){
            $this->showToastr('Vos Liens de Medias Sociaux ont été mis à jour avec succès.','success');
        }else{
            $this->showToastr('Quelque chose n\'a pas bien marché, veuillez réessayer.','error');
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
        return view('livewire.ui.admin.settings.social-config');
    }
}
