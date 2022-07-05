<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class SingleProjectComponent extends Component
{
    public function render()
    {
        return view('livewire.user.single-project-component')->layout('layouts.base');
    }
}
