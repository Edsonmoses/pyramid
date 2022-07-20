<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsComponet extends Component
{
    use WithFileUploads;

    public $setting, $logo, $favicon, $tophone, $email, $flogo, $fdesc, $location,
        $box, $phone, $creation, $setting_id;
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

    private function resetCreateForm()
    {
        $this->logo = '';
        $this->favicon = '';
        $this->tophone = '';
        $this->email = '';
        $this->flogo = '';
        $this->fdesc = '';
        $this->location = '';
        $this->box = '';
        $this->phone = '';
        $this->creation = '';
    }
    public function store()
    {
        $this->validate([
            'logo' => 'required ',
            'favicon' => 'required',
            'tophone' => 'required ',
            'email' => 'required',
            'flogo' => 'required ',
            'fdesc' => 'required',
            'location' => 'required ',
            'box' => 'required',
            'phone' => 'required ',
            'creation' => 'required',
        ]);
        $imageName = Carbon::now()->timestamp . '.' . $this->logo->extension();
        $this->logo->storeAs('images', $imageName);

        $faviconName = Carbon::now()->timestamp . '.' . $this->favicon->extension();
        $this->favicon->storeAs('ico', $faviconName);

        $flogoName = Carbon::now()->timestamp . '.' . $this->flogo->extension();
        $this->flogo->storeAs('images', $flogoName);

        $creationName = Carbon::now()->timestamp . '.' . $this->creation->extension();
        $this->creation->storeAs('images', $creationName);

        Setting::updateOrCreate(['id' => $this->setting_id], [
            'logo' => $imageName,
            'favicon' => $faviconName,
            'tophone' => $this->tophone,
            'email' => $this->email,
            'flogo' => $flogoName,
            'fdesc' => $this->fdesc,
            'location' => $this->location,
            'box' => $this->box,
            'phone' => $this->phone,
            'creation' => $creationName,

        ]);

        session()->flash(
            'message',
            $this->setting_id ? 'setting Updated Successfully.' : 'setting Created Successfully.'
        );
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        $this->setting_id = $id;
        $this->logo  = $setting->logo;
        $this->favicon = $setting->favicon;
        $this->tophone  = $setting->tophone;
        $this->email = $setting->email;
        $this->flogo  = $setting->flogo;
        $this->fdesc = $setting->fdesc;
        $this->location  = $setting->location;
        $this->box = $setting->box;
        $this->phone  = $setting->phone;
        $this->creation = $setting->creation;

        $this->openModalPopedit();
    }
    public function delete($id)
    {
        Setting::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
    public function render()
    {
        $this->setting = Setting::orderBy('logo')->get();
        return view('livewire.admin.settings-componet');
    }
}
