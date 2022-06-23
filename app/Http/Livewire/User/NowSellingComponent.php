<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class NowSellingComponent extends Component
{
    public function render()
    {
        return view('livewire.user.now-selling-component')->layout('layouts.base');
    }
}
