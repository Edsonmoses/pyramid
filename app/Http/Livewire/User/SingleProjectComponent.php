<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Livewire\Component;

class SingleProjectComponent extends Component
{
    public $slug;
    public $download;
    public $downloadCount;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function export($id)
    {
        $project = Project::where('id', $id)->firstOrFail();

        $project = Project::find($id);
        if ($project->downloadCount == 0 || $project->downloadCount == '') {
            $project->downloadCount = $this->downloadCount + 1;
        } else {
            $project->downloadCount += 1;
        }
        $project->save();

        $download_path = (public_path() . '/assets/user/images/' . $project->download);
        return (response()->download($download_path));
        //return(redirect(request()->header('Referer')) );
    }
    public function render()
    {
        $project = Project::where('slug', $this->slug)->orderBy('name', 'ASC')->first();
        return view('livewire.user.single-project-component', ['project' => $project])->layout('layouts.base');
    }
}
