<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Models\Project;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PropertyPlan;
use Livewire\WithFileUploads;

class PropertyPlansComponet extends Component
{
    use WithFileUploads;
    public $property, $name, $slug, $nameb, $subname, $desc, $image, $url, $property_id, $category;
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
        $placeObj = new PropertyPlan();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name . '-' . $this->nameb); //Removed all Special Character and replace with hyphen
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
    private function resetCreateForm()
    {
        $this->image = '';
        $this->name = '';
        $this->slug = '';
        $this->nameb = '';
        $this->subname = '';
        $this->desc = '';
        $this->url = '';
    }
    public function store()
    {
        $this->validate([
            'image' => 'required ',
        ]);
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName);

        PropertyPlan::updateOrCreate(['id' => $this->property_id], [
            'image' => $imageName,
            'name' => $this->name,
            'slug' => $this->slug,
            'nameb' => $this->nameb,
            'subname' => $this->subname,
            'desc' => $this->desc,
            'url' => $this->url,

        ]);

        session()->flash(
            'message',
            $this->property_id ? 'About Updated Successfully.' : 'About Created Successfully.'
        );
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $property = PropertyPlan::findOrFail($id);
        $this->property_id = $id;
        $this->image  = $property->image;
        $this->name = $property->name;
        $this->slug  = $property->slug;
        $this->nameb  = $property->nameb;
        $this->subname  = $property->subname;
        $this->desc  = $property->desc;
        $this->url  = $property->url;

        $this->openModalPopedit();
    }
    public function delete($id)
    {
        PropertyPlan::find($id)->delete();
        session()->flash('message', 'About Deleted Successfully.');
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            PropertyPlan::find($item['value'])->update(['position' => $item['order']]);
            session()->flash('message', 'About has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->property = PropertyPlan::orderBy('id')->get();
        $this->projects = Project::orderBy('id')->get();
        $this->pages = Page::orderBy('id')->get();
        return view('livewire.admin.property-plans-componet');
    }
}
