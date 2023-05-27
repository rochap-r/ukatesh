<?php

namespace App\Http\Livewire\Ui\Admin\TypeUser;
use App\Models\TypeUser as TypeUsers;
use Livewire\Component;
use Livewire\WithPagination;


class TypeUser extends Component
{
    use WithPagination;
    public $name;
    public $selected_id;

    public $perPage = 8;

    public function mount()
    {
        $this->resetPage();
    }
    public $updateTypeUserMode=false;

    public $rules=['name'=>'required | unique:type_users,name'];
    public $messages= [
        'name.required'=>'le nom du Type est obligatoire',
        'name.unique'=>'Ce Type existe déjà veuillez réessayez un autre nom!'
    ];
    protected $listeners=[
        'resetForm',
        'deleteTypeUserAction'
    ];



    public function resetForm()
    {
        $this->resetErrorBag();
        $this->name=null;
        $this->updateTypeUserMode=false;

    }

    public function addTypeUser()
    {
        $validated=$this->validate($this->rules,$this->messages);

        //creation du role et attachement des permissions
        $typeUser=TypeUsers::create($validated);

        if ($typeUser){
            $this->dispatchBrowserEvent('hideTypeUserModal');
            $this->name=null;

            $this->showToastr('Le nouveau Type a  été enregistrée avec succès!','success');
        }else{
            $this->showToastr('Oups! Quelque chose n\'a pas bien fonctionné!','error');
        }
    }

    public function editTypeUser(int $id)
    {
        $typeUser=TypeUsers::findOrFail( $id);

        $this->selected_id=$typeUser->id;
        $this->name=$typeUser->name;
        $this->updateTypeUserMode=true;
        //dd($this->updateCategoryMode);
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showEditTypeUserModal');
    }

    public function updateTypeUser()
    {
        if ($this->selected_id) {
            $this->validate([
                'name'=>'required|unique:type_users,name,'.$this->selected_id,
            ], [
                'name.required'=>'le nom du type est obligatoire',
                'name.unique'=>'Ce nom existe déjà veuillez réessayez un autre nom!'
            ]);

            $typeUser = TypeUsers::findOrFail($this->selected_id);

            $typeUser->name=$this->name;
            $result=$typeUser->save();
            if ($result) {
                $this->name=null;
                $this->dispatchBrowserEvent('hideTypeUserModal');
                $this->showToastr('Le nouveau Type a  été mis à jour avec succès!', 'success');
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


    public function render()
    {
        return view('livewire.ui.admin.type-user.type-user',[
            'typeUsers'=>TypeUsers::latest()->orderBy('id','asc')->withCount('users')->paginate($this->perPage),
        ]);
    }

    public function deleteTypeUser(int $id)
    {
        $typeUser=TypeUsers::findOrFail($id);
        $this->dispatchBrowserEvent('deleteTypeUser',[
            'title'=>'Etes-vous vraiment sure de supprimer ce Type d\'Utilisateurs?',
            'html'=>"Suppression du Type: ".$typeUser->name,
            'id'=>$typeUser->id

        ]);
    }

    public function deleteTypeUserAction(int $id)
    {
        $typeUser=TypeUsers::findOrFail($id);

        if ($typeUser){
            $typeUser->users()->update(['type_user_id'=>null]);
            $typeUser->delete();
            $this->showToastr("le Type d'Utilisateurs a été supprimé avec succès.", 'info');
        }else{
            $this->showToastr("Il est impossible de supprimer ce Type d'Utilisateurs, qui est configuré par defaut.", 'error');
        }

    }

}
