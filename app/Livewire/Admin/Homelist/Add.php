<?php

namespace App\Livewire\Admin\Homelist;

use Livewire\Component;
use App\Models\HomeList;
use App\Models\HomeImage;
use App\Models\Block;
use App\Models\HomeCategory;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Intervention\Image\ImageManager;

class Add extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $name, $category, $block_id, $unit_number, $price, $building_area, $land_area, $electrical_power, $number_of_bedrooms, $number_of_bathrooms, $status, $desc="";
    public $homeImage, $sketch_image, $floorplan;
    public $availableBlocks = [];
    #[Layout('components.layouts.admin')]

    public function updatedCategory($value)
    {
        $this->availableBlocks = Block::where('home_category_id', $value)->get();
        $this->block_id = null;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_lists',
            'category' => 'required|exists:home_categories,id',
            'price' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_area' => 'required|numeric',
            'electrical_power' => 'required|numeric',
            'number_of_bedrooms' => 'required|numeric',
            'number_of_bathrooms' => 'required|numeric',
            'status' => 'required|in:dijual,sewa',
            'desc' => 'required|string',
            'homeImage' => 'required|array|min:1|max:5',
            'homeImage.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'sketch_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'floorplan' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'block_id' => 'nullable|exists:blocks,id',
            'unit_number' => 'nullable|string|max:20',
        ]);

        if ($validatedData) {
            $random = Str::random(20);
            $sketchPath = $random . '.webp';
            $relativePath  = 'images/homeLists/' . $sketchPath;
            $storagePath = storage_path('app/public/' . $relativePath);
            // Konversi gambar ke WebP
            $image = ImageManager::imagick()
                ->read($this->sketch_image->path())
                // ->resize(136, 136)
                ->toWebp(90);
            file_put_contents($storagePath, $image);

            // Generate unique filename untuk floorplan
            $random = Str::random(20);
            $floorplanPath = $random . '.webp';
            $relativePath  = 'images/homeLists/' . $floorplanPath;
            $storagePath = storage_path('app/public/' . $relativePath);
            // Konversi gambar ke WebP
            $image = ImageManager::imagick()
                ->read($this->floorplan->path())
                // ->resize(136, 136)
                ->toWebp(90);
            file_put_contents($storagePath, $image);

            $home = HomeList::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'category_id' => $this->category,
                'block_id' => $this->block_id ?: null,
                'unit_number' => $this->unit_number ?: null,
                'price' => $this->price,
                'building_area' => $this->building_area,
                'land_area' => $this->land_area,
                'electrical_power' => $this->electrical_power,
                'number_of_bedrooms' => $this->number_of_bedrooms,
                'number_of_bathrooms' => $this->number_of_bathrooms,
                'status' => $this->status,
                'desc' => $this->desc,
                'sketch_image' => $sketchPath,
                'floorplan' => $floorplanPath,
            ]);

            foreach ($this->homeImage as $image) {
                $random = Str::random(20);
                $path = $random . '.webp';
                $relativePath  = 'images/detailHomeImages/' . $path;
                $storagePath = storage_path('app/public/' . $relativePath);
                // Konversi gambar ke WebP
                $image = ImageManager::imagick()
                    ->read($image->path())
                    // ->resize(136, 136)
                    ->toWebp(90);
                file_put_contents($storagePath, $image);

                HomeImage::create([
                    'home_id' => $home->id,
                    'image' => $path,
                ]);
            }
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/home-list', navigate: true);
    }
    public function render()
    {
        $homeCategories = HomeCategory::latest()->get();
        return view('livewire.admin.homelist.add', compact('homeCategories'));
    }

    public function mount()
    {
        $this->availableBlocks = collect();
    }
}
