<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class Index extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $sliderImg;
    public function render()
    {
        $setting = Setting::all();
        $imgSlider = Slider::all();
        return view('livewire.admin.setting.index', compact('setting','imgSlider'));
    }
    
    // delete image slider
    public function deleteImageSlider($idImage)
    {
        $imageSlider = Slider::where('id',$idImage)->first();
        if ($imageSlider) {
            // Hapus file dari penyimpanan
            $filePath = public_path('storage/images/sliders/' . $imageSlider->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Hapus entri dari database
            $imageSlider->delete();
        }
        $this->alert('success', 'Berhasil menghapus gambar slider ini');
        return back();
    }
    // menambahkan data baru slider
    public function saveSlider($sliderId)
    {
        $validatedData = $this->validate([
            'sliderImg' => 'array|min:1|max:5',
            'sliderImg.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validatedData) {
            $slider = Slider::find($sliderId);
            if (!$slider) {
                // Handle jika rumah tidak ditemukan
                return;
            }

            // Update gambar slider
            if (!empty($this->sliderImg)) {
                $totalImages = $slider->count(); // Menghitung jumlah gambar yang sudah ada
                $maxImages = 5 - $totalImages; // Maksimal gambar yang bisa ditambahkan

                // Periksa apakah jumlah gambar yang akan ditambahkan melebihi batas maksimum
                if (count($this->sliderImg) > $maxImages) {
                    $this->alert('warning', 'Total gambar properti melebihi 5 file'); // back
                    return back();
                } else {
                    // Iterasi untuk setiap gambar yang akan disimpan
                    foreach ($this->sliderImg as $key => $image) {
                        // Cek apakah jumlah gambar yang akan disimpan telah mencapai batas maksimum
                        if ($key < $maxImages) {
                            $random = Str::random(20);
                            $path = $random . '.webp';
                            $relativePath  = 'images/sliders/' . $path;
                            $storagePath = storage_path('app/public/' . $relativePath);
                            // Konversi gambar ke WebP
                            $image = ImageManager::imagick()
                                ->read($image->path())
                                // ->resize(136, 136)
                                ->toWebp(90);
                            file_put_contents($storagePath, $image);

                            Slider::create([
                                'image' => $path,
                            ]);
                        } else {
                            // Jika jumlah gambar sudah mencapai batas maksimum, hentikan iterasi
                            break;
                        }
                    }
                }
            }
        }
        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/setting', navigate: true);
    }
}
