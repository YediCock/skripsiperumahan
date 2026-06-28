<?php

namespace App\Livewire\Admin\Block;

use App\Models\Block;
use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $search = '';
    public $filterCategory = '';

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $blocks = Block::with('homeCategory')
            ->when($this->search, fn($q) => $q->where('name', 'LIKE', '%'.$this->search.'%'))
            ->when($this->filterCategory, fn($q) => $q->where('home_category_id', $this->filterCategory))
            ->latest()
            ->paginate(10);

        $categories = HomeCategory::latest()->get();

        return view('livewire.admin.block.index', compact('blocks', 'categories'));
    }

    public function deleteBlock($id)
    {
        $block = Block::find($id);
        if ($block) {
            $block->delete();
        }
        $this->alert('success', 'Blok berhasil dihapus');
    }
}
