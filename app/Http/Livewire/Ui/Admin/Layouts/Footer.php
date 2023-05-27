<?php

namespace App\Http\Livewire\Ui\Admin\Layouts;

use App\Models\GenConfig;
use Livewire\Component;

class Footer extends Component
{
    public $config;
    protected $listeners=[
        'updateFooter'=>'$refresh'
    ];
    public function mount(){
        $this->config=GenConfig::find(1);
    }
    public function render()
    {
        return view('livewire.ui.admin.layouts.footer');
    }
}
