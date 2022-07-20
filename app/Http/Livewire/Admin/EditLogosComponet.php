<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditLogosComponet extends Component
{
    use WithFileUploads;

    public $logos, $logoUrl, $name, $slug, $image, $newimage, $logos_id, $projects;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

    public function mount($slug)
    {
        $logos = Logo::where('slug', $slug)->first();
        $this->image = $logos->image;
        $this->name = $logos->name;
        $this->slug = $logos->slug;
        $this->logoUrl = $logos->logoUrl;
        $this->logos_id = $logos->id;
    }
    public function generateSlug()
    {
        $placeObj = new Logo();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $logosNameURL = strtolower($final_slug);
        $this->slug = Str::slug($logosNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($logosNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $logosNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $logosNameURL;
        }
    }

    public function storeLogos()
    {
        $this->validate([
            'name' => 'required ',
            'slug' => 'required ',
            'logoUrl' => 'required',
        ]);
        $logos = Logo::find($this->logos_id);
        $logos->name = $this->name;
        $logos->slug = $this->slug;
        $logos->logoUrl = $this->logoUrl;
        if ($this->newimage) {
            if (file_exists('assets/user/images' . '/' . $logos->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $logos->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $logos->image = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $logos->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                    $logos->image = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName);
                $logos->image = $imageName;
            }
        }
        $logos->save();
        session()->flash(
            'message',
            $this->logos_id ? 'logos Updated Successfully.' : 'logos Created Successfully.'
        );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Logo::find($item['value'])->update(['order_position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->projects = Project::orderBy('name')->where('disable', '=', 'active')->get();
        return view('livewire.admin.edit-logos-componet');
    }
}
