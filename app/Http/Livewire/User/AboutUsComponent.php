<?php

namespace App\Http\Livewire\User;

use App\Models\Page;
use Livewire\Component;

class AboutUsComponent extends Component
{
    public function render()
    {
        $this->pages = Page::orderBy('id')->get();
        return view('livewire.user.about-us-component')->layout('layouts.base');
    }
}
