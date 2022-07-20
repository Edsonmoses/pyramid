<?php

namespace App\Http\Livewire\User;

use App\Models\Logo;
use Livewire\Component;

class LogosComponent extends Component
{
    public $logos;
    public function render()
    {
        $this->logos = Logo::orderBy('name')->get();
        return view('livewire.user.logos-component');
    }
}
