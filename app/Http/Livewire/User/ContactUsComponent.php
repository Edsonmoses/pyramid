<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ContactUsComponent extends Component
{
    public function render()
    {
        return view('livewire.user.contact-us-component')->layout('layouts.base');
    }
}
