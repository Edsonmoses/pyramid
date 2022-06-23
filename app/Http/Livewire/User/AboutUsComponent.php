<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class AboutUsComponent extends Component
{
    public function render()
    {
        return view('livewire.user.about-us-component')->layout('layouts.base');
    }
}
