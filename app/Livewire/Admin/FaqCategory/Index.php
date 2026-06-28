<?php

namespace App\Livewire\Admin\FaqCategory;

use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $categories = FaqCategory::withCount('faqs')->orderBy('urutan')->get();
        return view('livewire.admin.faq-category.index', compact('categories'));
    }

    public function delete($id)
    {
        $cat = FaqCategory::find($id);
        if ($cat && $cat->faqs()->count() === 0) {
            $cat->delete();
            $this->alert('success', 'Kategori dihapus');
        } else {
            $this->alert('warning', 'Kategori masih memiliki FAQ, hapus FAQ-nya terlebih dahulu');
        }
    }
}
