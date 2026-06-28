<?php

namespace App\Livewire\Admin\FaqCategory;

use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;

    public $cat, $name, $urutan;

    #[Layout('components.layouts.admin')]
    public function mount($id)
    {
        $this->cat    = FaqCategory::findOrFail($id);
        $this->name   = $this->cat->name;
        $this->urutan = $this->cat->urutan;
    }

    public function render()
    {
        return view('livewire.admin.faq-category.edit');
    }

    public function save($id)
    {
        $this->validate(['name' => 'required|string|max:100|unique:faq_categories,name,'.$id, 'urutan' => 'nullable|integer']);
        FaqCategory::findOrFail($id)->update(['name' => $this->name, 'urutan' => $this->urutan ?? 0]);
        $this->flash('success', 'Kategori FAQ diperbarui');
        return $this->redirect('/admin/faq-category', navigate: true);
    }
}
