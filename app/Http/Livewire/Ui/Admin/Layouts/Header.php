<?php

namespace App\Http\Livewire\Ui\Admin\Layouts;

use App\Models\User;
use Livewire\Component;

class Header extends Component
{
    public $user;

    protected $listeners=[
        'UpdateHeader'=>'$refresh'
    ];

    public function mount(){
        $this->user=User::find(auth()->id());
    }
    public function render()
    {
        return view('livewire.ui.admin.layouts.header');
    }
}
