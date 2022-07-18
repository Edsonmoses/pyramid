<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Livewire\Component;

class OurProjectsComponent extends Component
{
    public function render()
    {
        $projects = Project::where('off', '=', 'show')->orderBy('order_position', 'ASC')->get();
        return view('livewire.user.our-projects-component', ['projects' => $projects])->layout('layouts.base');
    }
}
