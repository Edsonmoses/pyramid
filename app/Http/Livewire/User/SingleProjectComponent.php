<?php

namespace App\Http\Livewire\User;

use App\Models\Project;
use Livewire\Component;

class SingleProjectComponent extends Component
{
    public $slug;
    public $download;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function downloadFile()

    {

        $myFile = public_path("dummy_pdf.pdf");

        $headers = ['Content-Type: application/pdf'];

        $newName = 'itsolutionstuff-pdf-file-' . time() . '.pdf';


        return response()->download($myFile, $newName, $headers);
    }
    public function render()
    {
        $project = Project::where('slug', $this->slug)->orderBy('name', 'ASC')->first();
        return view('livewire.user.single-project-component', ['project' => $project])->layout('layouts.base');
    }
}
