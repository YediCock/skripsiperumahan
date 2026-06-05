<?php

namespace App\Livewire\Admin\ListCategory;

use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('components.layouts.admin')]
    public $name, $image;
    public $id;
    public $category;
    public function mount($id)
    {
        // Ambil data rumah dari database berdasarkan ID
        $this->category = HomeCategory::find($id);

        // Set nilai properti berdasarkan data rumah yang ditemukan
        if ($this->category) {
            $this->name = $this->category->name;
        }
    }
    public function save($ctgId)
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_categories,name,'.$ctgId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData) {
            $homeCategory = HomeCategory::find($ctgId);
            if (!$homeCategory) {
                // Handle jika rumah tidak ditemukan
                return;
            }

            // Update data rumah
            $homeCategory->name = $this->name;
            $homeCategory->slug = Str::slug($this->name);

            // Jika ada gambar baru diunggah, hapus gambar lama dan simpan gambar baru
            if ($this->image) {
                // Hapus gambar lama dari penyimpanan jika ada
                if ($homeCategory->image) {
                    Storage::disk('public')->delete('images/categories/'.$homeCategory->image);
                }
                // Simpan gambar baru
                $random = Str::random(20);
                $imgIdentity = $random . '.webp';
                $relativePath  = 'images/categories/' . $imgIdentity;
                $storagePath = storage_path('app/public/' . $relativePath);
                // Konversi gambar ke WebP
                $image = ImageManager::imagick()
                    ->read($this->image->path())
                    ->resize(136, 136)
                    ->toWebp(90);
                file_put_contents($storagePath, $image);

                $homeCategory->image = $imgIdentity;
            }

            // simpan
            $homeCategory->save();
        }

        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/home-category', navigate: true);
    }

    public function render()
    {
        if ($this->category) {
            $category = HomeCategory::find($this->id);    
            return view('livewire.admin.list-category.edit', compact('category'));
        }else{
            abort(404);
        }
    }
}
