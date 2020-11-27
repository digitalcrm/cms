<?php

namespace App\Http\Livewire\Customization;

use App\Logo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Customizelogo extends Component
{
    use WithFileUploads;

    public $removeFlashMessage;
    public $admin_panel_value;
    public $homepage_logo_value;
    public $favicon_value;

    public $admin_alt_text;
    public $admin_logo_path;
    public $uploadadminlogo;

    public $homepage_alt_text;
    public $homepage_logo_path;
    public $uploadhomepagelogo;

    // public $favicon_alt_text;
    public $favicon_path;
    public $uploadfavicon;

    public $iteration;
    public $iteration2;
    public $iteration3;
    public $save = false;
    public $save2 = false;
    public $save3 = false;

    public function updatedUploadadminlogo()
    {
        $this->validate([
            'uploadadminlogo' => 'image|max:512|mimes:png,jpg,jpeg', // 1024 = 1MB Max
        ]);
    }
    public function updatedUploadhomepagelogo()
    {
        $this->validate([
            'uploadhomepagelogo' => 'image|max:512|mimes:png,jpg,jpeg', // 1024 = 1MB Max
        ]);
    }
    public function updatedUploadfavicon()
    {
        $this->validate([
            'uploadfavicon' => 'image|max:512|mimes:png,jpg,jpeg', // 1024 = 1MB Max
        ]);
    }

    public function mount($admin_panel_value='admin_panel_logo', $homepage_logo_value='homepage__logo', $favicon_value='favicon')
    {
        try {
            //code...
            $this->admin_panel_value = Logo::where('options',$admin_panel_value)->firstOrFail();
            $this->homepage_logo_value = Logo::where('options',$homepage_logo_value)->firstOrFail();
            $this->favicon_value = Logo::where('options',$favicon_value)->firstOrFail();

            $this->admin_alt_text = $this->admin_panel_value->alt_text ?? '' ;
            $this->admin_logo_path = $this->admin_panel_value->profile_photo_url ?? '' ;

            $this->homepage_alt_text = $this->homepage_logo_value->alt_text ?? '' ;
            $this->homepage_logo_path = $this->homepage_logo_value->profile_photo_url ?? '' ;

            // $this->favicon_alt_text = $this->favicon_value->alt_text ?? '' ;
            $this->favicon_path = $this->favicon_value->profile_photo_url ?? '' ;
        } catch (\Throwable $e) {
            // dd($e);
            session()->flash('modelExceptionError', '😥 There is default value missing. Check Datatable! '.$e->getMessage());
        }
    }

    public function adminLogoDataSave()
    {
        $this->validate([
            'admin_alt_text' => 'required|string|max:50',
            'uploadadminlogo' => 'image|max:512|mimes:png,jpg,jpeg',
        ]);

        $adminLogo = Logo::where('options','admin_panel_logo')->findOrFail(1);

        if($this->uploadadminlogo){
            $adminlogopath = $this->uploadadminlogo->storePublicly('admin-logo','public');
        }

        $adminLogo->update([
            'alt_text' => $this->admin_alt_text,
            'logo_path' => $adminlogopath,
        ]);

        $this->save = true;
        $this->iteration++;
        // $this->emit('fileInputClear');

        session()->flash('message', 'Admin Logo uploaded successfully');
    }

    public function homePageLogoDataSave()
    {
        $this->validate([
            'homepage_alt_text' => 'required|string|max:50',
            'uploadhomepagelogo' => 'image|max:512|mimes:png,jpg,jpeg',
        ]);

        $homepageLogo = Logo::where('options','homepage__logo')->findOrFail(2);

        if($this->uploadhomepagelogo){
            $homepagelogopath = $this->uploadhomepagelogo->storePublicly('homepage-logo','public');
        }

        $homepageLogo->update([
            'alt_text' => $this->homepage_alt_text,
            'logo_path' => $homepagelogopath,
        ]);

        // $this->reset('uploadhomepagelogo');
        $this->save2 = true;
        $this->iteration2++;

        session()->flash('message', 'Homepage Logo uploaded successfully');
    }

    public function favicon()
    {
        $this->validate([
            // 'favicon_alt_text' => 'required|string|max:50',
            'uploadfavicon' => 'image|max:512|mimes:png,jpg,jpeg', // 512Kb Max
        ]);

        $favicon = Logo::where('options','favicon')->findOrFail(3);

        if($this->uploadfavicon){
            $faviconpath = $this->uploadfavicon->storePublicly('favicon','public');
        }

        $favicon->update([
            // 'alt_text' => $this->favicon_alt_text,
            'logo_path' => $faviconpath,
        ]);

        // $this->reset('uploadfavicon');
        $this->save3 = true;
        $this->iteration3++;

        session()->flash('message', 'Favicon uploaded successfully');
    }

    public function render()
    {
        return view('livewire.customization.customizelogo');
    }
}
