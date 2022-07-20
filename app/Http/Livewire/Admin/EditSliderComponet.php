<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditSliderComponet extends Component
{
    use WithFileUploads;

    public $slider, $slug, $image, $newimage, $name, $location, $url, $btname, $slider_id, $projects;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

    public function mount($slug)
    {
        $slider = Slider::where('slug', $slug)->first();
        $this->image = $slider->image;
        $this->name = $slider->name;
        $this->location = $slider->location;
        $this->url = $slider->url;
        $this->btname = $slider->btname;
        $this->slider_id = $slider->id;
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

    public function storeSlider()
    {
        $this->validate([
            'name' => 'required ',
            'slug' => 'required ',
            'location' => 'required ',
            'url' => 'required',
            'btname' => 'required ',
        ]);
        $slider = Slider::find($this->slider_id);
        $slider->name = $this->name;
        $slider->slug = $this->slug;
        $slider->location = $this->location;
        $slider->url = $this->url;
        $slider->btname = $this->btname;
        if ($this->newimage) {
            if (file_exists('assets/user/images' . '/' . $slider->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $slider->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $slider->image = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $slider->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                    $slider->image = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName);
                $slider->image = $imageName;
            }
        }
        $slider->save();
        session()->flash(
            'message',
            $this->slider_id ? 'Slider Updated Successfully.' : 'Slider Created Successfully.'
        );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Slider::find($item['value'])->update(['position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->projects = Project::orderBy('name')->get();
        return view('livewire.admin.edit-slider-componet');
    }
}
