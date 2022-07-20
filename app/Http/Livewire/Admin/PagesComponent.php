<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class PagesComponent extends Component
{
    use WithFileUploads;
    public $pages, $name, $slug, $image, $desc, $position, $pages_id, $category;
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
        $placeObj = new Page();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $pagesNameURL = strtolower($final_slug);
        $this->slug = Str::slug($pagesNameURL);
        //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($pagesNameURL)->exists();
        if ($checkSlug) {
            //Slug already exists.
            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;
            while (1) {
                //Check if Slug with final prefix exists.
                $newSlug = $pagesNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $pagesNameURL;
        }
    }
    private function resetCreateForm()
    {
        $this->image = '';
        $this->name = '';
        $this->slug = '';
        $this->desc = '';
    }
    public function store()
    {
        $this->validate([
            'image' => 'required ',
        ]);
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName);

        Page::updateOrCreate(['id' => $this->pages_id], [
            'image' => $imageName,
            'name' => $this->name,
            'slug' => $this->slug,
            'desc' => $this->desc,

        ]);

        session()->flash(
            'message',
            $this->pages_id ? 'Page Updated Successfully.' : 'Page Created Successfully.'
        );
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $pages = Page::findOrFail($id);
        $this->pages_id = $id;
        $this->image  = $pages->image;
        $this->name = $pages->name;
        $this->slug  = $pages->slug;
        $this->desc  = $pages->desc;

        $this->openModalPopedit();
    }
    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Page::find($item['value'])->update(['position' => $item['order']]);
            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        $this->pages = Page::orderBy('id')->get();
        return view('livewire.admin.pages-component');
    }
}
