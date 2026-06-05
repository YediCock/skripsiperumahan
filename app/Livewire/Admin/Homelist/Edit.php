<?php

namespace App\Livewire\Admin\Homelist;

use App\Models\HomeCategory;
use App\Models\HomeImage;
use Livewire\Component;
use App\Models\HomeList;
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
    public $name, $category, $price, $building_area, $land_area, $electrical_power, $number_of_bedrooms, $number_of_bathrooms, $status, $desc; 
    public $homeImage, $sketch_image, $floorplan;
    public $id;
    public $homes;
    public function mount($id)
    {
        // Ambil data rumah dari database berdasarkan ID
        $this->homes = HomeList::find($id);

        // Set nilai properti berdasarkan data rumah yang ditemukan
        if ($this->homes) {
            $this->name = $this->homes->name;
            $this->category = $this->homes->category_id;
            $this->building_area = $this->homes->building_area;
            $this->land_area = $this->homes->land_area;
            $this->electrical_power = $this->homes->electrical_power;
            $this->number_of_bedrooms = $this->homes->number_of_bedrooms;
            $this->number_of_bathrooms = $this->homes->number_of_bathrooms;
            $this->status = $this->homes->status;
            $this->desc = $this->homes->desc;
            
            $this->desc = $this->homes->desc;

            // price
            $value = $this->homes->price ?? ''; 
            $price = preg_replace('/[^0-9]/', '', $value);
            $this->price = $price;


        }
    }
    public function deleteImage($idImage)
    {
        $homeImageDelete = HomeImage::where('home_id', $this->id)->where('id',$idImage)->first();
        if ($homeImageDelete) {
            // Hapus file dari penyimpanan
            $filePath = public_path('storage/images/detailHomeImages/' . $homeImageDelete->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            // Hapus entri dari database
            $homeImageDelete->delete();
        }
        $this->alert('success', 'Berhasil menghapus gambar properti ini');
        return back();
    }
    public function save($homeId)
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:home_lists,name,'.$homeId,
            'category' => 'required|exists:home_categories,id',
            'price' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_area' => 'required|numeric',
            'electrical_power' => 'required|numeric',
            'number_of_bedrooms' => 'required|numeric',
            'number_of_bathrooms' => 'required|numeric',
            'status' => 'required|in:dijual,sewa,terjual,tersewa',
            'desc' => 'required',
            'sketch_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'floorplan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData) {
            $home = HomeList::find($homeId);
            if (!$home) {
                // Handle jika rumah tidak ditemukan
                return;
            }

            // Update data rumah
            $home->name = $this->name;
            $home->slug = Str::slug($this->name);
            $home->category_id = $this->category;
            $home->price = $this->price;
            $home->building_area = $this->building_area;
            $home->land_area = $this->land_area;
            $home->electrical_power = $this->electrical_power;
            $home->number_of_bedrooms = $this->number_of_bedrooms;
            $home->number_of_bathrooms = $this->number_of_bathrooms;
            $home->status = $this->status;
            $home->desc = $this->desc;

            // Cek apakah ada perubahan pada gambar sketch
            if ($this->sketch_image) {
                // Hapus gambar yang lama
                if ($home->sketch_image) {
                    Storage::disk('public')->delete('images/homeLists/' . $home->sketch_image);
                }
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

                $home->sketch_image = $sketchPath;
            }

            // Cek apakah ada perubahan pada gambar floorplan
            if ($this->floorplan) {
                // Hapus gambar yang lama
                if ($home->floorplan) {
                    Storage::disk('public')->delete('images/homeLists/' . $home->floorplan);
                }
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
                $home->floorplan = $floorplanPath;
            }

            // Simpan perubahan pada rumah
            $home->save();

            // Update gambar rumah
            if (!empty($this->homeImage)) {
                // Lakukan validasi untuk gambar homeImage
                $vakidateHomeImage =  $this->validate([
                    'homeImage' => 'array|min:1|max:5',
                    'homeImage.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                if ($vakidateHomeImage) {
                    $totalImages = $home->homeImage()->count(); // Menghitung jumlah gambar yang sudah ada
                    $maxImages = 5 - $totalImages; // Maksimal gambar yang bisa ditambahkan

                    // Periksa apakah jumlah gambar yang akan ditambahkan melebihi batas maksimum
                    if (count($this->homeImage) > $maxImages) {
                        $this->alert('warning', 'Total gambar properti melebihi 5 file'); // back
                        return back();
                    } else {
                        // Iterasi untuk setiap gambar yang akan disimpan
                        foreach ($this->homeImage as $key => $image) {
                            // Cek apakah jumlah gambar yang akan disimpan telah mencapai batas maksimum
                            if ($key < $maxImages) {
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
                            } else {
                                // Jika jumlah gambar sudah mencapai batas maksimum, hentikan iterasi
                                break;
                            }
                        }
                    }
                }
            }
        }

        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/home-list', navigate: true);
    }

    public function render()
    {
        // $id = $this->id;
        // $homes = HomeList::where('id', $this->id)->firstOrFail();
        if ($this->homes) {
            $homes = HomeList::find($this->id);
            $homeCategory = HomeCategory::get();
            $homeImages = HomeImage::where('home_id', $homes->id)->get();
    
            return view('livewire.admin.homelist.edit', compact('homes','homeCategory', 'homeImages'));
        }else{
            abort(404);
        }
    }
}
