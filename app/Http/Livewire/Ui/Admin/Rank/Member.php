<?php

namespace App\Http\Livewire\Ui\Admin\Rank;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Member extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 8;

    public function mount()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.ui.admin.rank.member', [
            'users' => User::search(trim($this->search))->whereNotNull('type_user_id')->where('type_user_id', '<>', 0)->orderBy('id','DESC')->paginate($this->perPage),
        ]);
    }
}
