<?php

namespace App\Http\Livewire\Ui\Admin\Fonctions;

use Livewire\Component;
use \App\Models\Fonction as Fonctions;
use Livewire\WithPagination;

class Fonction extends Component
{

    use WithPagination;
    public $name;
    public $selected_id;

    public $perPage = 8;

    public function mount()
    {
        $this->resetPage();
    }
    public $updateFonctionMode=false;

    public $rules=['name'=>'required | unique:fonctions,name'];
    public $messages= [
        'name.required'=>'le nom de la fonction est obligatoire',
        'name.unique'=>'Cette Fonction existe déjà veuillez réessayez un autre nom!'
    ];
    protected $listeners=[
        'resetForm',
        'deleteFonctionAction'
    ];



    public function resetForm()
    {
        $this->resetErrorBag();
        $this->name=null;
        $this->updateFonctionMode=false;

    }

    public function addFonction()
    {
        $validated=$this->validate($this->rules,$this->messages);

        //creation du role et attachement des permissions
        $typeUser=Fonctions::create($validated);

        if ($typeUser){
            $this->dispatchBrowserEvent('hideFonctionModal');
            $this->name=null;

            $this->showToastr('La nouvelle fonction a  été enregistrée avec succès!','success');
        }else{
            $this->showToastr('Oups! Quelque chose n\'a pas bien fonctionné!','error');
        }
    }

    public function editFonction(int $id)
    {
        $fonction=Fonctions::findOrFail( $id);

        $this->selected_id=$fonction->id;
        $this->name=$fonction->name;
        $this->updateFonctionMode=true;
        //dd($this->updateCategoryMode);
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showEditFonctionModal');
    }

    public function updateFonction()
    {
        if ($this->selected_id) {
            $this->validate([
                'name'=>'required|unique:fonctions,name,'.$this->selected_id,
            ], [
                'name.required'=>'le nom de la fonction est obligatoire',
                'name.unique'=>'Cette fonction existe déjà veuillez réessayez un autre nom!'
            ]);

            $typeUser = Fonctions::findOrFail($this->selected_id);

            $typeUser->name=$this->name;
            $result=$typeUser->save();
            if ($result) {
                $this->name=null;
                $this->dispatchBrowserEvent('hideFonctionModal');
                $this->showToastr('La nouvelle Fonction a  été mis à jour avec succès!', 'success');
            } else {
                $this->showToastr('Oups! Quelque chose n\'a pas bien fonctionné!', 'error');
            }
        }
    }


    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }


    public function deleteFonction(int $id)
    {
        $fonction=Fonctions::findOrFail($id);
        $this->dispatchBrowserEvent('deleteFonction',[
            'title'=>'Etes-vous vraiment sure de supprimer cette Fonction d\'Utilisateurs?',
            'html'=>"Suppression du Fonction: ".$fonction->name,
            'id'=>$fonction->id

        ]);
    }

    public function deleteFonctionAction(int $id)
    {
        $fonction=Fonctions::findOrFail($id);

        if ($fonction){
            $fonction->users()->update(['type_user_id'=>null]);
            $fonction->delete();
            $this->showToastr("la Fonction d'Utilisateurs a été supprimé avec succès.", 'info');
        }else{
            $this->showToastr("Il est impossible de supprimer cette Fonction d'Utilisateurs, qui est configuré par defaut.", 'error');
        }

    }

    public function render()
    {
        return view('livewire.ui.admin.fonctions.fonction',[
            'fonctions'=>Fonctions::latest()->orderBy('id','asc')->withCount('users')->paginate($this->perPage),
        ]);
    }
}
