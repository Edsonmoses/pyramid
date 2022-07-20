<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PropertyPlan;
use Livewire\WithFileUploads;

class EditPropertyPlansComponet extends Component
{
    use WithFileUploads;

    public $property, $name, $slug, $nameb, $subname, $desc, $image, $newimage, $url, $property_id, $category;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

    public function mount($slug)
    {
        $property = PropertyPlan::where('slug', $slug)->first();
        $this->image = $property->image;
        $this->name = $property->name;
        $this->slug = $property->slug;
        $this->nameb = $property->nameb;
        $this->subname = $property->subname;
        $this->desc = $property->desc;
        $this->url = $property->url;
        $this->property_id = $property->id;
    }
    public function generateSlug()
    {
        $placeObj = new PropertyPlan();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $propertyNameURL = strtolower($final_slug);
        $this->slug = Str::slug($propertyNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($propertyNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $propertyNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $propertyNameURL;
        }
    }

    public function storeProperty()
    {
        $this->validate([
            'name' => 'required ',
            'slug' => 'required ',
            'nameb' => 'required',
            'subname' => 'required',
            'desc' => 'required',
            'url' => 'required',
        ]);
        $property = PropertyPlan::find($this->property_id);
        $property->name = $this->name;
        $property->slug = $this->slug;
        $property->nameb = $this->nameb;
        $property->subname = $this->subname;
        $property->desc = $this->desc;
        $property->url = $this->url;
        if ($this->newimage) {
            if (file_exists('assets/user/images' . '/' . $property->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $property->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $property->image = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $property->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                    $property->image = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName);
                $property->image = $imageName;
            }
        }
        $property->save();
        session()->flash(
            'message',
            $this->property_id ? 'property Updated Successfully.' : 'property Created Successfully.'
        );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            PropertyPlan::find($item['value'])->update(['order_position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->property = PropertyPlan::orderBy('id')->get();
        $this->projects = Project::orderBy('id')->get();
        $this->pages = Page::orderBy('id')->get();
        return view('livewire.admin.edit-property-plans-componet');
    }
}
