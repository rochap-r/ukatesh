<?php

namespace App\Http\Livewire\Ui\Admin;
//
use App\Models\Type as Types;
use Livewire\Component;
use Livewire\WithPagination;

class Type extends Component
{
    use WithPagination;
    public $name;
    public $selected_id;

    public $perPage = 8;

    public function mount()
    {
        $this->resetPage();
    }
    public $updateTypeMode=false;

    public $rules=['name'=>'required | unique:types,name'];
    public $messages= [
        'name.required'=>'le nom du Type est obligatoire',
        'name.unique'=>'Ce Type existe déjà veuillez réessayez un autre nom!'
    ];
    protected $listeners=[
        'resetForm',
        'deleteTypeAction'
    ];



    public function resetForm()
    {
        $this->resetErrorBag();
        $this->name=null;
        $this->updateTypeMode=false;

    }

    public function addType()
    {
        $validated=$this->validate($this->rules,$this->messages);

        //creation du role et attachement des permissions
        $role=Types::create($validated);

        if ($role){
            $this->dispatchBrowserEvent('hideTypeModal');
            $this->name=null;

            $this->showToastr('Le nouveau Type a  été enregistrée avec succès!','success');
        }else{
            $this->showToastr('Oups! Quelquechose n\'a pas bien fonctionné!','error');
        }
    }

    public function editType(int $id)
    {
        $type=Types::findOrFail( $id);

        $this->selected_id=$type->id;
        $this->name=$type->name;
        $this->updateTypeMode=true;
        //dd($this->updateCategoryMode);
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showEditTypeModal');
    }

    public function updateType()
    {
        if ($this->selected_id) {
            $this->validate([
                'name'=>'required|unique:types,name,'.$this->selected_id,
            ], [
                'name.required'=>'le nom du type est obligatoire',
                'name.unique'=>'Ce nom existe déjà veuillez réessayez un autre nom!'
            ]);

            $type = Types::findOrFail($this->selected_id);

            $type->name=$this->name;
            $result=$type->save();
            if ($result) {
                $this->name=null;
                $this->dispatchBrowserEvent('hideTypeModal');
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
        return view('livewire.ui.admin.type',[
            'types'=>Types::latest()->orderBy('id','asc')->withCount('galeries')->paginate($this->perPage),
        ]);
    }


    public function deleteType(int $id)
    {
        $type=Types::findOrFail($id);
        $this->dispatchBrowserEvent('deleteType',[
            'title'=>'Etes-vous vraiment sure de supprimer ce Type?',
            'html'=>"Suppression du Type: ".$type->name,
            'id'=>$type->id

        ]);
    }

    public function deleteTypeAction(int $id)
    {
        $type=Types::findOrFail($id);

        if ($type){
            $type->galeries()->update(['type_id'=>null]);
            $type->delete();
            $this->showToastr("le Type a été supprimé avec succès.", 'info');
        }else{
            $this->showToastr("Il est impossible de supprimer ce Status, qui est configuré par defaut.", 'error');
        }

    }
}
