<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $company_name, $phone, $desc, $image_promotion, $image_logo;
    public $id;
    public $setting;
    
    public function mount($id)
    {
        // Ambil data rumah dari database berdasarkan ID
        $this->setting = Setting::find($id);

        // Set nilai properti berdasarkan data rumah yang ditemukan
        if ($this->setting) {
            $this->company_name = $this->setting->company_name;
            $this->phone = $this->setting->phone;
            $this->desc = $this->setting->desc;
        }
    }
    public function save($settingId)
    {
        $validatedData = $this->validate([
            'company_name' => 'required',
            'phone' => 'required|numeric',
            'image_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_promotion' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validatedData) {
            $setting = Setting::find($settingId);
            if (!$setting) {
                // Handle jika setting tidak ditemukan
                return;
            }
    
            // Update data setting
            $setting->company_name = $this->company_name;
            $setting->phone = $this->phone;
            $setting->desc = $this->desc;
    
            // Cek apakah ada perubahan pada gambar logo
            if ($this->image_logo) {
                // Hapus gambar lama jika ada
                if ($setting->image_logo) {
                    Storage::disk('public')->delete('images/settings/' . $setting->image_logo);
                }

                $random = Str::random(20);
                $imageLogo = $random . '.webp';
                $relativePath  = 'images/settings/' . $imageLogo;
                $storagePath = storage_path('app/public/' . $relativePath);
                // Konversi gambar ke WebP
                $image = ImageManager::imagick()
                    ->read($this->image_logo->path())
                    // ->resize(136, 136)
                    ->toWebp(90);
                file_put_contents($storagePath, $image);

                $setting->image_logo = $imageLogo;
            }
    
            // Cek apakah ada perubahan pada gambar promotion
            if ($this->image_promotion) {
                // Hapus gambar lama jika ada
                if ($setting->image_promotion) {
                    Storage::disk('public')->delete('images/settings/' . $setting->image_promotion);
                }

                $random = Str::random(20);
                $imagePromotion = $random . '.webp';
                $relativePath  = 'images/settings/' . $imagePromotion;
                $storagePath = storage_path('app/public/' . $relativePath);
                // Konversi gambar ke WebP
                $image = ImageManager::imagick()
                    ->read($this->image_promotion->path())
                    // ->resize(136, 136)
                    ->toWebp(90);
                file_put_contents($storagePath, $image);

                $setting->image_promotion = $imagePromotion;
            }
    
            $setting->save();
        }
    
        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/setting', navigate: true);
    }
    public function render()
    {
        if ($this->setting) {
            $setting = Setting::find($this->id);
            return view('livewire.admin.setting.edit', compact('setting'));
        }else{
            abort(404);
        }
    }
}
