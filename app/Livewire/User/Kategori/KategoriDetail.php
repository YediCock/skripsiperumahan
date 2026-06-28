<?php

namespace App\Livewire\User\Kategori;

use App\Models\Block;
use App\Models\HomeCategory;
use Livewire\Component;

class KategoriDetail extends Component
{
    public $slug;
    public $category;

    public function mount($slug)
    {
        $this->slug     = $slug;
        $this->category = HomeCategory::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $category = $this->category;

        $blocks = Block::where('home_category_id', $category->id)
            ->with(['homeList' => function ($q) use ($category) {
                $q->where('category_id', $category->id)->with('homeImage');
            }])
            ->get();

        // Unit tanpa blok
        $unitsWithoutBlock = $category->homeList()
            ->whereNull('block_id')
            ->with('homeImage')
            ->get();

        return view('livewire.user.kategori.detail', compact('category', 'blocks', 'unitsWithoutBlock'));
    }
}
