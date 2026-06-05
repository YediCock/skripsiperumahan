<?php

namespace App\Livewire\Admin\ListCategory;

use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Intervention\Image\ImageManager;
class Add extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $image, $name;
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.list-category.add');
    }
    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_categories',            
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($validatedData) {
            
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

            HomeCategory::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'image' => $imgIdentity,
            ]);
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/home-category', navigate: true);
    }
}
