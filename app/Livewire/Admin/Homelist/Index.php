<?php

namespace App\Livewire\Admin\Homelist;

use Livewire\Component;
use App\Models\HomeList;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    
    #[Layout('components.layouts.admin')]
    public $search = '';
    public $selectedHome;
    public function render()
    {
        $homeLists = HomeList::latest()->search($this->search)->paginate(10);
        return view('livewire.admin.homelist.index', compact('homeLists'));
    }

    // detail home list
    public function showDetail($homeId)
    {
        $this->selectedHome = HomeList::findOrFail($homeId);
    }

    public function deleteHome($id)
    {
        $home = HomeList::findOrFail($id);

        // Hapus gambar properti dari penyimpanan
        foreach ($home->homeImage as $image) {
            $filePath = public_path('storage/images/detailHomeImages/' . $image->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // Hapus gambar floorplan
        $floorplanPath = public_path('storage/images/homeLists/' . $home->floorplan);
        if (File::exists($floorplanPath)) {
            File::delete($floorplanPath);
        }

        // Hapus gambar sketch
        $sketchPath = public_path('storage/images/homeLists/' . $home->sketch_image);
        if (File::exists($sketchPath)) {
            File::delete($sketchPath);
        }

        // Hapus entri dari tabel home_image
        $home->homeImage()->delete();

        // Hapus entri dari tabel homelist
        $home->delete();

        $this->alert('success', 'Berhasil menghapus properti ini');
        return back();
    }

}

