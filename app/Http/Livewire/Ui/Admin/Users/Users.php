<?php

namespace App\Http\Livewire\Ui\Admin\Users;

use App\Models\GenConfig;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Nette\Utils\Random;

class Users extends Component
{
    use WithPagination;
    public $name, $sname, $lname, $phone, $email, $type_user_id, $gender, $role,$fonction;
    public $search;
    public $perPage = 8;
    public $selected_user_id;

    protected $listeners = [
        'resetForms',
        'deleteUserAction'
    ];
    public function mount()
    {
        $this->resetForms();
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function resetForms()
    {
        $this->name = $this->sname = $this->lname = $this->role= $this->fonction = $this->phone = $this->email = $this->type_user_id = $this->gender = null;
        $this->resetErrorBag();
    }
    public function addUser()
    {
        $this->validate([
            'name' => 'required',
            'sname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:6|max:18',
            'type_user_id' => 'nullable',
            'role' => 'nullable',
            'fonction' => 'nullable',
            'gender' => 'required',
        ], [
            'name.required' => 'Ce champs est obligatoire veuillez le remplir',
            'sname.required' => 'Ce champs est obligatoire veuillez le remplir',
            'lname.required' => 'Ce champs est obligatoire veuillez le remplir',
            'email.required' => 'Ce champs est obligatoire veuillez le remplir',
            'email.email' => 'Veuillez saisir un email valide',
            'email.unique' => 'cet email est déjà prit utilisez un autre',
            'phone.required' => 'Ce champs est obligatoire veuillez le remplir',
            'role.required' => 'Impossible de créer un utilisateur sans Role',
            'phone.min' => 'Le numéro de téléphone doit avoir au moins 06 chiffres',
            'phone.max' => 'Le numéro de téléphone doit avoir au plus 13 caractères',
            'gender.required' => 'Ce champs est obligatoire veuillez choisir un genre',
        ]);

        if ($this->isOnline()) {

            $default_password = Random::generate(10);
            $user = new User();
            $user->name = $this->name;
            $user->sname = $this->sname;
            $user->lname = $this->lname;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->gender = $this->gender;
            $user->password = Hash::make($default_password);
            $user->role_id = (int) $this->role;
            $user->fonction_id = (int) $this->fonction;
            $user->type_user_id = (int) $this->type_user_id;
            $result = $user->save();

            $data = [
                'name' => $this->name,
                'sname' => $this->sname,
                'email' => $this->email,
                'password' => $default_password,
            ];
            $user_email = $this->email;
            $user_name = $this->name;
            $admin_email=GenConfig::find(1)->email;
            $appName=env('APP_NAME');

            if ($result) {
                Mail::send('emails.new-user_email-template', $data, function ($message) use ($user_email, $user_name) {
                    $message->to($user_email, $user_name)
                        ->from('contact@ukatesh.org', env('APP_NAME'))
                        ->subject('Création du Compte Utilisateur');
                });
                $this->showToastr('Un nouveau user a été créé avec succès', 'success');
                $this->name = $this->sname = $this->lname = $this->phone =$this->role =$this->fonction = $this->email = $this->type_user_id = $this->gender = null;
                Mail::send('emails.new-user-create', $data, function ($message) use ($admin_email, $appName) {
                    $message->to($admin_email, $appName)
                        //->cc(GenConfig::find(1)->email) env('MAIL_USERNAME')
                        ->from('contact@ukatesh.org', env('APP_NAME'))
                        ->subject('Adhésion d\'un nouveau utilisateur');
                });
                $this->dispatchBrowserEvent('hide_add_user_modal');
            } else {
                $this->showToastr('Quelque chose n\'a pas bien fonctionné!', 'error');
            }
        } else {
            $this->showToastr('Votre appareil est hors connexion, veuillez vous réconnecter puis réessayer', 'error');
        }
    }


    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'sname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selected_user_id,
            'phone' => 'required|min:6|max:18',
            'type_user_id' => 'nullable',
            'role' => 'nullable',
            'fonction' => 'nullable',
            'gender' => 'required',
        ], [
            'name.required' => 'Ce champs est obligatoire veuillez le remplir',
            'sname.required' => 'Ce champs est obligatoire veuillez le remplir',
            'lname.required' => 'Ce champs est obligatoire veuillez le remplir',
            'email.required' => 'Ce champs est obligatoire veuillez le remplir',
            'email.email' => 'Veuillez saisir un email valide',
            'email.unique' => 'cet email est déjà prit utilisez un autre',
            'phone.required' => 'Ce champs est obligatoire veuillez le remplir',
            'phone.min' => 'Le numéro de téléphone doit avoir au moins 06 chiffres',
            'phone.max' => 'Le numéro de téléphone doit avoir au plus 13 caractères',
            'gender.required' => 'Ce champs est obligatoire veuillez choisir un genre',
        ]);

        if ($this->selected_user_id) {
            $user = User::find($this->selected_user_id);

            $user->update([
                'name' => $this->name,
                'sname' =>  $this->sname,
                'lname'  =>  $this->lname,
                'email' =>  $this->email,
                'phone'  =>  $this->phone,
                'gender'  =>  $this->gender,
                'role_id' =>  (int)$this->role,
                'fonction_id' =>  (int)$this->fonction,
                'type_user_id'  =>  (int)$this->type_user_id,

            ]);
            $this->showToastr('Les informations d\' un Utilisateur ont été mis à jour avec succès', 'success');
            $this->dispatchBrowserEvent('hide_modal-user-edit');
        }
    }

    public function editUser($user)
    {
        $this->selected_user_id = $user['id'];
        $this->name = $user['name'];
        $this->sname = $user['sname'];
        $this->lname = $user['lname'];
        $this->role = $user['role_id'];
        $this->fonction = $user['fonction_id'];
        $this->email = $user['email'];
        $this->phone = $user['phone'];
        $this->gender = $user['gender'];
        $this->type_user_id = $user['type_user_id'];
        $this->dispatchBrowserEvent('showEditUserModal');
    }

    public function deleteUserAction($id)
    {
        $role=Role::where('name','admin')->first()->name;
        //dd(auth()->user()->role->name);
        $userRole=auth()->user()->role->name;
        if (auth()->id()!==$id || $userRole!==$role){
            $user = User::find($id);
            if(!empty($user->posts->toArray())){
                User::whereHas('role',function($query){
                    $query->where('name','admin');
                })->first()->posts()->saveMany($user->posts);
            }

            if ($user->image) {
                $path = $user->image->path;
            }

            if ($user->image !== null && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $user->delete();
            $this->showToastr('le membre a été supprimé avec succès.', 'info');
        }else{
            $this->showToastr("L'Administrateur du système ne peut pas être supprimé.", 'error');
        }

    }
    public function deleteUser($user)
    {
        $this->dispatchBrowserEvent('deleteUser', [
            'title' => 'Etes-vous sûre?',
            'html' => 'Vous voulez supprimer: <br>
            <b>' . $user['name'] . '-' . $user['sname'] . '</b> <br><b>'.  'du système Ukatesh!</b>',
            'id' => $user['id'],
        ]);
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
    public function isOnline($site = 'https://youtube.com/')
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }



    public function render()
    {
        return view('livewire.ui.admin.users.users', [
            'users' => User::search(trim($this->search))->withCount('posts')->orderBy('id','DESC')->paginate($this->perPage),
        ]);
    }
}
