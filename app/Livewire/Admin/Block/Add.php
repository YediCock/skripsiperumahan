<?php

namespace App\Livewire\Admin\Block;

use App\Models\Block;
use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;

    public $name, $home_category_id;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $categories = HomeCategory::latest()->get();
        return view('livewire.admin.block.add', compact('categories'));
    }

    public function save()
    {
        $this->validate([
            'home_category_id' => 'required|exists:home_categories,id',
            'name'             => 'required|string|max:100',
        ]);

        Block::create([
            'home_category_id' => $this->home_category_id,
            'name'             => $this->name,
            'slug'             => Str::slug($this->name . '-' . $this->home_category_id . '-' . Str::random(5)),
        ]);

        $this->flash('success', 'Blok berhasil ditambahkan');
        return $this->redirect('/admin/block', navigate: true);
    }
}
