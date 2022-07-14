<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Livewire\Component;

class OurProjectsComponent extends Component
{
    public function render()
    {
        $projects = Project::all();
        return view('livewire.user.our-projects-component', ['projects' => $projects])->layout('layouts.base');
    }
}
