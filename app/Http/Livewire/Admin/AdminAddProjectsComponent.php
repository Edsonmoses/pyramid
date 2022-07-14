<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProjectsComponent extends Component
{
    use WithFileUploads;

    public $project,  $title, $name, $slug, $image, $desc, $statno, $statname,
        $statsub, $gallery, $floorplan, $fimage, $download, $project_id;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function openModalPopedit()
    {
        $this->editModalOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function closeModalPopedit()
    {
        $this->editModalOpen = false;
    }

    public function generateSlug()
    {
        $placeObj = new Project();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $projectNameURL = strtolower($final_slug);
        $this->slug = Str::slug($projectNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($projectNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $projectNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug
                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.
                if (!$checkSlug) {
                    //There is not more coincidence. Finally found unique slug.
                    $this->slug = $newSlug; //New Slug 
                    break; //Break Loop
                }
            }
        } else {
            //Slug do not exists. Just use the selected Slug.
            $this->slug = $projectNameURL;
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetCreateForm()
    {
        $this->title = '';
        $this->name = '';
        $this->slug = '';
        $this->image = '';
        $this->desc = '';
        $this->statno = '';
        $this->statname = '';
        $this->statsub = '';
        $this->gallery = '';
        $this->floorplan = '';
        $this->fimage = '';
        $this->download = '';
        $this->project_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'name' => 'required ',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'desc' => 'required',
            'statno' => 'required ',
            'statname' => 'required',
            'statsub' => 'required ',
            'gallery' => 'required|mimes:png,jpg,jpeg',
            'floorplan' => 'required|mimes:png,jpg,jpeg',
            'fimage' => 'required|mimes:png,jpg,jpeg',
        ]);
        if ($this->image) {
            if (file_exists('assets/user/images' . '/' . $this->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $this->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                } else {
                    unlink('assets/user/images' . '/' . $this->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName);
            }
        }
        if ($this->fimage) {
            if (file_exists('assets/user/images' . '/' . $this->fimage)) {
                if (!empty(file_exists('assets/user/images' . '/' . $this->fimage))) {
                    $fimageName = Carbon::now()->timestamp . '.' . $this->fimage->extension();
                    $this->fimage->storeAs('images', $fimageName);
                } else {
                    unlink('assets/user/images' . '/' . $this->fimage);
                    $fimageName = Carbon::now()->timestamp . '.' . $this->fimage->extension();
                    $this->fimage->storeAs('images', $fimageName);
                }
            } else {
                $fimageName = Carbon::now()->timestamp . '.' . $this->fimage->extension();
                $this->fimage->storeAs('images', $fimageName);
            }
        }
        if ($this->gallery) {
            $imagesname = '';
            foreach ($this->gallery as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('images', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
        }
        Project::updateOrCreate(['id' => $this->project_id], [

            'title' => $this->title,
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $imageName,
            'desc' => $this->desc,
            'statno' => str_replace("\n", ',', trim($this->statno)),
            'statname' => str_replace("\n", ',', trim($this->statname)),
            'statsub' => str_replace("\n", ',', trim($this->statsub)),
            'gallery' => str_replace("\n", ',', trim($imagesname)),
            'floorplan' => $this->floorplan,
            'fimage' => $fimageName,
            'download' => $this->download

        ]);

        session()->flash(
            'message',
            $this->project_id ? 'Project Updated Successfully.' : 'Project Created Successfully.'
        );

        //$this->closeModal();
        $this->resetCreateForm();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->project_id = $id;
        $this->title = $project->title;
        $this->name  = $project->name;
        $this->slug = $project->slug;
        $this->image  = $project->image;
        $this->desc = $project->desc;
        $this->statno  = str_replace("\n", ',', trim($project->statno));
        $this->statname = str_replace("\n", ',', trim($project->statname));
        $this->statsub  = str_replace("\n", ',', trim($project->statsub));
        $this->gallery = str_replace("\n", ',', trim($project->imagesname));
        $this->floorplan  = $project->floorplan;
        $this->fimage = $project->fimage;
        $this->download = $project->download;

        $this->openModalPopedit();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Project::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-projects-component');
    }
}
