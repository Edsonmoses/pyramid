<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Logo;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class LogosComponet extends Component
{
    use WithFileUploads;
    public $logos, $logoUrl, $name, $slug, $image, $logos_id, $projects;
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
    private function resetCreateForm()
    {
        $this->image = '';
        $this->logoUrl = '';
        $this->name = '';
        $this->slug = '';
    }
    public function store()
    {
        $this->validate([
            'image' => 'required ',
        ]);
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName);

        Logo::updateOrCreate(['id' => $this->logos_id], [
            'image' => $imageName,
            'logoUrl' => $this->logoUrl,
            'name' => $this->name,
            'slug' => $this->slug,

        ]);

        session()->flash(
            'message',
            $this->logos_id ? 'Logo Updated Successfully.' : 'Logo Created Successfully.'
        );
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $logos = Logo::findOrFail($id);
        $this->logos_id = $id;
        $this->image  = $logos->image;
        $this->logoUrl = $logos->logoUrl;
        $this->name = $logos->name;
        $this->slug  = $logos->slug;

        $this->openModalPopedit();
    }
    public function delete($id)
    {
        Logo::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Logo::find($item['value'])->update(['position' => $item['order']]);
            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->logos = Logo::orderBy('name')->get();
        $this->projects = Project::orderBy('name')->where('disable', '=', 'active')->get();
        return view('livewire.admin.logos-componet');
    }
}
