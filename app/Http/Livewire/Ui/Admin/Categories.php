<?php

namespace App\Http\Livewire\Ui\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $name;
    public $selected_id;

    public $perPage = 8;
    public $updateCategoryMode=false;

    public function mount()
    {
        $this->resetPage();
    }

    //ecouteur de réunitialisation du form dans le modal sur index de categories
    protected $listeners=[
        'resetForm',
        'deleteCategoryAction'
    ];

    //cette function communique l'ecouteur
    public function resetForm()
    {
        $this->resetErrorBag();
        $this->updateCategoryMode=false;
        $this->name=null;

    }
    public function addCategory()
    {
        $this->validate([
            'name'=>'required|unique:categories,name',
        ], [
            'name.required'=>'le nom de la catégorie est obligatoire',
            'name.unique'=>'Cette catégorie existe déjà veuillez réessayez un autre nom!'
        ]);
        $category=new Category();
        $category->name=$this->name;
        //le slug est generé à partir du model
        //$category->slug=Str::slug($this->name);
        $result=$category->save();
        if ($result){
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->name=null;
            $this->showToastr('La nouvelle Catégorie a  été enregistrée avec succès!','success');
        }else{
            $this->showToastr('Oups! Quelquechose n\'a pas bien fonctionné!','error');
        }

    }

    public function editCategory(int $id)
    {
        $category=Category::findOrFail( $id);
        $this->selected_id=$category->id;
        $this->name=$category->name;
        $this->updateCategoryMode=true;
        //dd($this->updateCategoryMode);
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showEditCategoriesModal');
    }

    public function updateCategory()
    {
        if ($this->selected_id){
            $this->validate([
                'name'=>'required|unique:categories,name,'.$this->selected_id,
            ], [
                'name.required'=>'le nom de la catégorie est obligatoire',
                'name.unique'=>'Cette catégorie existe déjà veuillez réessayez un autre nom!'
            ]);

            $category=Category::findOrFail($this->selected_id);
            $category->name=$this->name;
            //$category->slug=Str::slug($this->name);
            $result=$category->save();
            if ($result){
                $this->dispatchBrowserEvent('hideCategoriesModal');
                $this->updateCategoryMode=false;
                $this->name=null;
                $this->showToastr('La nouvelle Catégorie a bien été mis à jour!','success');
            }else{
                $this->showToastr('Oups! Quelquechose n\'a pas bien fonctionné!','error');
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
        //dd(Category::orderBy('id','asc')->withCount('posts')->select(['name','id','slug'])->get());
        return view('livewire.ui.admin.categories',[
            'categories'=>Category::latest()->orderBy('id','asc')->withCount('posts')->paginate($this->perPage),
        ]);
    }

    public function deleteCategoryAction(int $id)
    {
        $category=Category::find($id);
        //dd($category);
        //$default_category_id=Category::where('name','sans-categorie')->first()->id;
        //$default_category_id=$default_category_id??null;
        if ($category){
            //$category->posts()->update(['category_id'=>$default_category_id]);
            $category->delete();
            $this->showToastr("la Catégorie a été supprimé avec succès.", 'info');
        }else{
            $this->showToastr("Il est impossible de supprimer cette catégorie, qui est configurée par defaut.", 'error');
        }

    }

    public function deleteCategory(int $id)
    {
        $category=Category::find($id);
        $this->dispatchBrowserEvent('deleteCategory',[
            'title'=>'Etes-vous vraiment sure de supprimer cet article?',
            'html'=>"Suppression de la Catégorie: ".$category->name,
            'id'=>$category->id

        ]);
    }
}

