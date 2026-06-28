<?php

namespace App\Livewire\Admin\Block;

use App\Models\Block;
use App\Models\HomeCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $name, $home_category_id;
    public $block;
    public $id;

    #[Layout('components.layouts.admin')]
    public function mount($id)
    {
        $this->block = Block::find($id);
        if ($this->block) {
            $this->name             = $this->block->name;
            $this->home_category_id = $this->block->home_category_id;
        }
    }

    public function render()
    {
        if (!$this->block) abort(404);
        $categories = HomeCategory::latest()->get();
        return view('livewire.admin.block.edit', compact('categories'));
    }

    public function save($blockId)
    {
        $this->validate([
            'home_category_id' => 'required|exists:home_categories,id',
            'name'             => 'required|string|max:100',
        ]);

        $block = Block::find($blockId);
        if (!$block) return;

        $block->name             = $this->name;
        $block->home_category_id = $this->home_category_id;
        $block->slug             = Str::slug($this->name . '-' . $this->home_category_id . '-' . Str::random(5));
        $block->save();

        $this->flash('success', 'Blok berhasil diperbarui');
        return $this->redirect('/admin/block', navigate: true);
    }
}
