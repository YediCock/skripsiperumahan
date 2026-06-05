<?php

namespace App\Livewire\Admin\ListCategory;

use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    
    #[Layout('components.layouts.admin')]
    public $search = '';
    public function render()
    {
        $homeCategories = HomeCategory::latest()->search($this->search)->paginate(10);
        return view('livewire.admin.list-category.index', compact('homeCategories'));
    }
    public function deleteCategory($id)
    {
        $homeCategory = HomeCategory::findOrFail($id);

        // Hapus gambar kategori
        $image = public_path('storage/images/categories/' . $homeCategory->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        // Hapus entri dari tabel homecategory
        $homeCategory->delete();

        $this->alert('success', 'Berhasil menghapus kategori ini');
        return back();
    }
}
