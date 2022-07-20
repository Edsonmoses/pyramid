<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSettingsComponet extends Component
{
    use WithFileUploads;

    public $setting, $slug, $logo, $newlogo, $favicon, $newfavicon, $tophone, $email, $flogo, $newflogo,
        $fdesc, $location, $box, $phone, $creation, $newcreation, $setting_id;

    public function mount($slug)
    {
        $setting = Setting::where('id', $slug)->first();
        $this->logo = $setting->logo;
        $this->favicon = $setting->favicon;
        $this->tophone = $setting->tophone;
        $this->email = $setting->email;
        $this->flogo = $setting->flogo;
        $this->fdesc = $setting->fdesc;
        $this->location = $setting->location;
        $this->box = $setting->box;
        $this->phone = $setting->phone;
        $this->creation = $setting->creation;
        $this->setting_id = $setting->id;
    }

    public function storeSetting()
    {
        $this->validate([
            'tophone' => 'required ',
            'email' => 'required',
            'fdesc' => 'required',
            'location' => 'required ',
            'box' => 'required',
            'phone' => 'required ',
        ]);
        $setting = Setting::find($this->setting_id);
        $setting->tophone = $this->tophone;
        $setting->email = $this->email;
        $setting->fdesc = $this->fdesc;
        $setting->location = $this->location;
        $setting->box = $this->box;
        $setting->phone = $this->phone;
        if ($this->newlogo) {
            if (file_exists('assets/user/images' . '/' . $setting->logo)) {
                if (!empty(file_exists('assets/user/images' . '/' . $setting->logo))) {
                    $imageName = Carbon::now()->timestamp . '.' . $this->newlogo->extension();
                    $this->newlogo->storeAs('images', $imageName);
                    $setting->logo = $imageName;
                } else {
                    unlink('assets/user/images' . '/' . $setting->logo);
                    $imageName = Carbon::now()->timestamp . '.' . $this->logo->extension();
                    $this->logo->storeAs('images', $imageName);
                    $setting->logo = $imageName;
                }
            } else {
                $imageName = Carbon::now()->timestamp . '.' . $this->logo->extension();
                $this->logo->storeAs('images', $imageName);
                $setting->logo = $imageName;
            }
        }
        if ($this->newfavicon) {
            if (file_exists('assets/user/ico' . '/' . $setting->fimage)) {
                if (!empty(file_exists('assets/user/ico' . '/' . $setting->fimage))) {
                    $faviconName = Carbon::now()->timestamp . '.' . $this->newfavicon->extension();
                    $this->newfavicon->storeAs('ico', $faviconName);
                    $setting->favicon = $faviconName;
                } else {
                    unlink('assets/user/images' . '/' . $setting->fimage);
                    $faviconName = Carbon::now()->timestamp . '.' . $this->newfavicon->extension();
                    $this->newfavicon->storeAs('ico', $faviconName);
                    $setting->favicon = $faviconName;
                }
            } else {
                $faviconName = Carbon::now()->timestamp . '.' . $this->newfavicon->extension();
                $this->newfavicon->storeAs('ico', $faviconName);
                $setting->favicon = $faviconName;
            }
        }
        if ($this->newflogo) {
            if (file_exists('assets/user/images' . '/' . $setting->flogo)) {
                if (!empty(file_exists('assets/user/images' . '/' . $setting->flogo))) {
                    $flogoName = Carbon::now()->timestamp . '.' . $this->newflogo->extension();
                    $this->newflogo->storeAs('images', $flogoName);
                    $setting->flogo = $flogoName;
                } else {
                    unlink('assets/user/images' . '/' . $setting->flogo);
                    $flogoName = Carbon::now()->timestamp . '.' . $this->newflogo->extension();
                    $this->newflogo->storeAs('images', $flogoName);
                    $setting->flogo = $flogoName;
                }
            } else {
                $flogoName = Carbon::now()->timestamp . '.' . $this->newflogo->extension();
                $this->newflogo->storeAs('images', $flogoName);
                $setting->flogo = $flogoName;
            }
        }
        if ($this->newcreation) {
            if (file_exists('assets/user/images' . '/' . $setting->creation)) {
                if (!empty(file_exists('assets/user/images' . '/' . $setting->creation))) {
                    $creationName = Carbon::now()->timestamp . '.' . $this->newcreation->extension();
                    $this->newcreation->storeAs('images', $creationName);
                    $setting->creation = $creationName;
                } else {
                    unlink('assets/user/images' . '/' . $setting->creation);
                    $creationName = Carbon::now()->timestamp . '.' . $this->newcreation->extension();
                    $this->newcreation->storeAs('images', $creationName);
                    $setting->creation = $creationName;
                }
            } else {
                $creationName = Carbon::now()->timestamp . '.' . $this->newcreation->extension();
                $this->newcreation->storeAs('images', $creationName);
                $setting->creation = $creationName;
            }
        }
        $setting->save();
        session()->flash(
            'message',
            $this->setting_id ? 'setting Updated Successfully.' : 'setting Created Successfully.'
        );
    }
    public function updateProjectOrder($items)
    {
        foreach ($items as $item) {
            Setting::find($item['value'])->update(['order_position' => $item['order']]);

            session()->flash('message', 'Project has been Sorted Successfully.');
        }
    }
    public function render()
    {
        return view('livewire.admin.edit-settings-componet');
    }
}
