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
    public $name, $image, $address, $brochure_image, $site_plan_image;
    public $id;
    public $category;
    public function mount($id)
    {
        $this->category = HomeCategory::find($id);

        if ($this->category) {
            $this->name    = $this->category->name;
            $this->address = $this->category->address;
        }
    }
    public function save($ctgId)
    {
        $validatedData = $this->validate([
            'name'            => 'required|unique:home_categories,name,'.$ctgId,
            'address'         => 'nullable|string|max:255',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'brochure_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'site_plan_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($validatedData) {
            $homeCategory = HomeCategory::find($ctgId);
            if (!$homeCategory) {
                return;
            }

            $homeCategory->name    = $this->name;
            $homeCategory->slug    = Str::slug($this->name);
            $homeCategory->address = $this->address;

            if ($this->image) {
                if ($homeCategory->image) {
                    Storage::disk('public')->delete('images/categories/'.$homeCategory->image);
                }
                $random = Str::random(20);
                $imgIdentity = $random . '.webp';
                $img = ImageManager::imagick()->read($this->image->path())->resize(136, 136)->toWebp(90);
                file_put_contents(storage_path('app/public/images/categories/' . $imgIdentity), $img);
                $homeCategory->image = $imgIdentity;
            }

            if ($this->brochure_image) {
                if ($homeCategory->brochure_image) {
                    Storage::disk('public')->delete('images/categories/'.$homeCategory->brochure_image);
                }
                $random = Str::random(20);
                $brochurePath = $random . '.webp';
                $img = ImageManager::imagick()->read($this->brochure_image->path())->toWebp(90);
                file_put_contents(storage_path('app/public/images/categories/' . $brochurePath), $img);
                $homeCategory->brochure_image = $brochurePath;
            }

            if ($this->site_plan_image) {
                if ($homeCategory->site_plan_image) {
                    Storage::disk('public')->delete('images/categories/'.$homeCategory->site_plan_image);
                }
                $random = Str::random(20);
                $sitePlanPath = $random . '.webp';
                $img = ImageManager::imagick()->read($this->site_plan_image->path())->toWebp(90);
                file_put_contents(storage_path('app/public/images/categories/' . $sitePlanPath), $img);
                $homeCategory->site_plan_image = $sitePlanPath;
            }

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
