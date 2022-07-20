<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditPagesComponent extends Component
{
    use WithFileUploads;

    public $pages, $name, $slug, $image, $newimage, $desc, $position, $pages_id, $category;
    public $isModalOpen = 0;
    public $editModalOpen = 0;

    public function mount($slug)
    {
        $pages = Page::where('slug', $slug)->first();
        $this->image = $pages->image;
        $this->name = $pages->name;
        $this->slug = $pages->slug;
        $this->desc = $pages->desc;
        $this->pages_id = $pages->id;
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

    public function storePages()
    {
        $this->validate([
            'name' => 'required ',
            'slug' => 'required ',
            'desc' => 'required',
        ]);
        $pages = Page::find($this->pages_id);
        $pages->name = $this->name;
        $pages->slug = $this->slug;
        $pages->desc = $this->desc;
        if ($this->newimage) {
            if (file_exists('assets/user/images' . '/' . $pages->image)) {
                if (!empty(file_exists('assets/user/images' . '/' . $pages->image))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                    $this->newimage->storeAs('images', $imageName);
                    $pages->image = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $pages->image);
                    $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                    $this->image->storeAs('images', $imageName);
                    $pages->image = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('images', $imageName);
                $pages->image = $imageName;
            }
        }
        $pages->save();
        session()->flash(
            'message',
            $this->pages_id ? 'pages Updated Successfully.' : 'pages Created Successfully.'
        );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Page::find($item['value'])->update(['order_position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-pages-component');
    }
}
