<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\PropertyPlan;

class BenefitsComponent extends Component
{
    public function render()
    {
        $this->property = PropertyPlan::orderBy('id')->get();
        return view('livewire.user.benefits-component');
    }
}
