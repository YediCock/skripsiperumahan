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
    public $image, $name, $address, $brochure_image, $site_plan_image;
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.list-category.add');
    }
    public function save()
    {
        $validatedData = $this->validate([
            'name'            => 'required|unique:home_categories',
            'address'         => 'nullable|string|max:255',
            'image'           => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'brochure_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'site_plan_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($validatedData) {
            $random = Str::random(20);
            $imgIdentity = $random . '.webp';
            $relativePath  = 'images/categories/' . $imgIdentity;
            $storagePath = storage_path('app/public/' . $relativePath);
            $image = ImageManager::imagick()
                ->read($this->image->path())
                ->resize(136, 136)
                ->toWebp(90);
            file_put_contents($storagePath, $image);

            $brochurePath = null;
            if ($this->brochure_image) {
                $random = Str::random(20);
                $brochurePath = $random . '.webp';
                $img = ImageManager::imagick()->read($this->brochure_image->path())->toWebp(90);
                file_put_contents(storage_path('app/public/images/categories/' . $brochurePath), $img);
            }

            $sitePlanPath = null;
            if ($this->site_plan_image) {
                $random = Str::random(20);
                $sitePlanPath = $random . '.webp';
                $img = ImageManager::imagick()->read($this->site_plan_image->path())->toWebp(90);
                file_put_contents(storage_path('app/public/images/categories/' . $sitePlanPath), $img);
            }

            HomeCategory::create([
                'name'            => $this->name,
                'slug'            => Str::slug($this->name),
                'address'         => $this->address,
                'image'           => $imgIdentity,
                'brochure_image'  => $brochurePath,
                'site_plan_image' => $sitePlanPath,
            ]);
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/home-category', navigate: true);
    }
}
