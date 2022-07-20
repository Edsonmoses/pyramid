<?php

namespace App\Http\Livewire\User;

use App\Models\Slider;
use Livewire\Component;

class HeaderSliderComponent extends Component
{
    public $slider;
    public function render()
    {
        $this->slider = Slider::orderBy('name')->get();
        return view('livewire.user.header-slider-component');
    }
}
