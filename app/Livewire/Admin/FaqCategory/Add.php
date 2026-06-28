<?php

namespace App\Livewire\Admin\FaqCategory;

use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;

    public $name = '', $urutan = 0;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.faq-category.add');
    }

    public function save()
    {
        $this->validate(['name' => 'required|string|max:100|unique:faq_categories,name', 'urutan' => 'nullable|integer']);
        FaqCategory::create(['name' => $this->name, 'urutan' => $this->urutan ?? 0]);
        $this->flash('success', 'Kategori FAQ ditambahkan');
        return $this->redirect('/admin/faq-category', navigate: true);
    }
}
