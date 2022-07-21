<?php

namespace App\Http\Livewire\Admin;


use Carbon\Carbon;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
use App\Models\Features;

class AdminProjectsComponent extends Component
{
    use WithFileUploads;

    public $project,  $title, $name, $slug, $image, $desc, $statno, $statname,
        $statsub, $gallery, $floorplan, $fimage, $download, $downloadCount, $project_id, $disable, $hbcolor;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

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
        $this->reset('image');
        $this->desc = '';
        $this->statno = '';
        $this->statname = '';
        $this->statsub = '';
        $this->hbcolor = '';
        $this->reset('gallery');
        $this->reset('floorplan');
        $this->reset('fimage');
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
            //'statno.0' => 'required ',
            //'statname.0' => 'required',
            //'statsub.0' => 'required ',
            //'statno.*' => 'required ',
            // 'statname.*' => 'required',
            //'statsub.*' => 'required ',
            //'hbcolor' => 'required ',
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
        if ($this->download) {
            if (file_exists('assets/user/images' . '/' . $this->download)) {
                if (!empty(file_exists('assets/user/images' . '/' . $this->download))) {
                    $downName = Carbon::now()->timestamp . '.' . $this->download->extension();
                    $this->download->storeAs('images', $downName);
                    $this->download = $downName;
                } else {
                    unlink('assets/user/images' . '/' . $this->download);
                    $downName = Carbon::now()->timestamp . '.' . $this->download->extension();
                    $this->download->storeAs('images', $downName);
                    $this->download = $downName;
                }
            } else {
                $downName = Carbon::now()->timestamp . '.' . $this->download->extension();
                $this->download->storeAs('images', $downName);
                $this->download = $downName;
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
        if ($this->floorplan) {
            $fimagesname = '';
            foreach ($this->floorplan as $key => $image) {
                $imgfName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('images', $imgfName);
                $fimagesname = $fimagesname . ',' . $imgfName;
            }
        }
        if ($this->fimage) {
            $ftimagesname = '';
            foreach ($this->fimage as $key => $image) {
                $imgftName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('images', $imgftName);
                $ftimagesname = $ftimagesname . ',' . $imgftName;
            }
        }
        Project::updateOrCreate(['id' => $this->project_id], [

            'title' => $this->title,
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $imageName,
            'desc' => $this->desc,
            'hbcolor' => $this->hbcolor,
            'gallery' => str_replace("\n", ',', trim($imagesname)),
            'floorplan' => str_replace("\n", ',', trim($fimagesname)),
            'fimage' => str_replace("\n", ',', trim($ftimagesname)),
            'download' => $downName,
            'downloadCount' => '0',
            'disable' => 'active'

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
        $this->floorplan  = str_replace("\n", ',', trim($project->fimagesname));
        $this->fimage = str_replace("\n", ',', trim($project->fimage));
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
    public function disable($id)
    {
        $project = Project::find($id);
        $project->disable = 'inactive';
        $project->save();
        session()->flash('message', 'Project Deactivated Successfully.');
    }
    public function enable($id)
    {
        $project = Project::find($id);
        $project->disable = 'active';
        $project->save();
        session()->flash('message', 'Project Activated Successfully.');
    }
    public function unPublish($id)
    {
        $project = Project::find($id);
        $project->off = 'hide';
        $project->save();
        session()->flash('message', 'Project Deactivated Successfully.');
    }
    public function Publish($id)
    {
        $project = Project::find($id);
        $project->off = 'show';
        $project->save();
        session()->flash('message', 'Project Activated Successfully.');
    }
    public function exports($id)
    {
        $project = Project::where('id', $id)->firstOrFail();

        $project = Project::find($id);
        if ($project->downloadCount == 0 || $project->downloadCount == '') {
            $project->downloadCount = $this->downloadCount + 1;
        } else {
            $project->downloadCount += 1;
        }
        $project->save();

        $download_path = (public_path() . '/assets/user/images' . $project->download);
        return (response()->download($download_path));
        //return(redirect(request()->header('Referer')) );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Project::find($item['value'])->update(['order_position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }

    public function render()
    {
        $this->project = Project::orderBy('order_position')->get();
        return view('livewire.admin.admin-projects-component');
    }
}
