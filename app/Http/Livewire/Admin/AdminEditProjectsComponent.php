<?php

namespace App\Http\Livewire\Admin;

use App\Models\Features;
use Carbon\Carbon;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Validator;

class AdminEditProjectsComponent extends Component
{
    use WithFileUploads;

    public $title, $name, $slug, $image, $newimage, $desc, $statno, $statname,
        $statsub, $gallery,  $newgallery, $floorplan, $newfloorplan, $fimage, $newfimage,
        $download, $newdownload, $project_id, $hbcolor;

    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    /**
     * Write code on Method
     * @return response()
     */

    public function add($i)

    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    /**

     * Write code on Method
     * @return response()
     */

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount($slug)
    {
        $project = project::where('slug', $slug)->first();
        $this->title = $project->title;
        $this->name = $project->name;
        $this->slug = $project->slug;
        $this->image = $project->image;
        $this->desc = $project->desc;
        $this->floorplan = explode(",", $project->floorplan);
        $this->fimage = explode(",", $project->fimage);
        $this->download = $project->download;
        $this->gallery = explode(",", $project->gallery);
        $this->project_id = $project->id;
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
    public function storeProject()
    {
        $this->validate([
            'title' => 'required',
            'name' => 'required ',
            'slug' => 'required',
            //'image' => 'required|mimes:png,jpg,jpeg',
            'desc' => 'required',
            //'hbcolor' => 'required',
            //'statno.0' => 'required ',
            //'statname.0' => 'required',
            //'statsub.0' => 'required ',
            //'statno.*' => 'required ',
            //'statname.*' => 'required',
            //'statsub.*' => 'required ',
            // 'fimage' => 'required|mimes:png,jpg,jpeg',
        ]);
        $project = Project::find($this->project_id);
        $project->title = $this->title;
        $project->name = $this->name;
        $project->slug = $this->slug;
        $project->desc = $this->desc;
        if ($this->newimage) {
            if (file_exists('assets/user/images' . '/' . $project->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $project->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $project->image = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $project->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $project->image = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('images', $imageName);
                $project->image = $imageName;
            }
        }
        if ($this->newdownload) {
            if (file_exists('assets/user/images' . '/' . $project->download)) {
                if (!empty(file_exists('assets/user/images' . '/' . $project->download))) {
                    $downName = Carbon::now()->timestamp . '.' . $this->newdownload->extension();
                    $this->newdownload->storeAs('images', $downName);
                    $project->download = $downName;
                } else {
                    unlink('assets/user/images' . '/' . $project->download);
                    $downName = Carbon::now()->timestamp . '.' . $this->newdownload->extension();
                    $this->newdownload->storeAs('images', $downName);
                    $project->download = $downName;
                }
            } else {
                $downName = Carbon::now()->timestamp . '.' . $this->newdownload->extension();
                $this->newdownload->storeAs('images', $downName);
                $project->download = $downName;
            }
        }

        if ($this->newgallery) {
            if ($project->gallery) {
                $images = explode(",", $project->gallery);
                foreach ($images as $image) {
                    if ($image) {
                        unlink('assets/user/images' . '/' . $image);
                    }
                }
            }

            $imagesname = '';
            foreach ($this->newgallery as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('images', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $project->gallery = $imagesname;
        }
        if ($this->newfloorplan) {
            if ($project->floorplan) {
                $fimages = explode(",", $project->floorplan);
                foreach ($fimages as $imagef) {
                    if ($imagef) {
                        unlink('assets/user/images' . '/' . $imagef);
                    }
                }
            }

            $imagefsname = '';
            foreach ($this->newfloorplan as $key => $imagef) {
                $imgfName = Carbon::now()->timestamp . $key . '.' . $imagef->extension();
                $imagef->storeAs('images', $imgfName);
                $imagefsname = $imagefsname . ',' . $imgfName;
            }
            $project->floorplan = $imagefsname;
        }
        if ($this->newfimage) {
            if ($project->fimage) {
                $ftimages = explode(",", $project->fimage);
                foreach ($ftimages as $imageft) {
                    if ($imageft) {
                        unlink('assets/user/images' . '/' . $imageft);
                    }
                }
            }

            $ftimagesname = '';
            foreach ($this->newfimage as $key => $image) {
                $imgftName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('images', $imgftName);
                $ftimagesname = $ftimagesname . ',' . $imgftName;
            }
            $project->fimage = $ftimagesname;
        }
        /* foreach ($this->statname as $key => $value) {

            Features::create([
                'statno' => $this->statno[$key],
                'statname' => $this->statname[$key],
                'statsub' => $this->statsub[$key],
            ]);
        }
        $this->inputs = [];*/
        $project->save();
        session()->flash(
            'message',
            $this->project_id ? 'Project Updated Successfully.' : 'Project Created Successfully.'
        );
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-projects-component');
    }
}
