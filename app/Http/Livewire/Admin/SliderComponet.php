<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class SliderComponet extends Component
{
    use WithFileUploads;
    public $slider, $image, $name, $slug, $location, $url, $btname, $slider_id, $projects;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

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
        $placeObj = new Slider();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $sliderNameURL = strtolower($final_slug);
        $this->slug = Str::slug($sliderNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($sliderNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $sliderNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $sliderNameURL;
        }
    }
    private function resetCreateForm()
    {
        $this->image = '';
        $this->slug = '';
        $this->name = '';
        $this->location = '';
        $this->url = '';
        $this->btname = '';
    }
    public function store()
    {
        $this->validate([
            'image' => 'required ',
        ]);
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName);

        Slider::updateOrCreate(['id' => $this->slider_id], [
            'image' => $imageName,
            'name' => $this->name,
            'slug' => $this->slug,
            'location' => $this->location,
            'url' => $this->url,
            'btname' => $this->btname,

        ]);

        session()->flash(
            'message',
            $this->slider_id ? 'Slider Updated Successfully.' : 'Slider Created Successfully.'
        );
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $this->slider_id = $id;
        $this->image  = $slider->image;
        $this->name = $slider->name;
        $this->slug = $slider->slug;
        $this->location  = $slider->location;
        $this->url = $slider->url;
        $this->btname  = $slider->btname;

        $this->openModalPopedit();
    }
    public function delete($id)
    {
        Slider::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
    public function render()
    {
        $this->slider = Slider::orderBy('name')->get();
        $this->projects = Project::orderBy('name')->get();
        return view('livewire.admin.slider-componet');
    }
}
