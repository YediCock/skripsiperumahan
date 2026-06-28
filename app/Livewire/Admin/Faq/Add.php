<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use App\Models\FaqCategory;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;

    public $faq_category_id = '', $pertanyaan, $jawaban, $urutan = 0, $aktif = true;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $categories = FaqCategory::orderBy('urutan')->get();
        return view('livewire.admin.faq.add', compact('categories'));
    }

    public function save()
    {
        $this->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'pertanyaan'      => 'required|string',
            'jawaban'         => 'required|string',
            'urutan'          => 'nullable|integer',
        ]);

        $cat = FaqCategory::find($this->faq_category_id);
        Faq::create([
            'faq_category_id' => $this->faq_category_id,
            'kategori'        => $cat->name,
            'pertanyaan'      => $this->pertanyaan,
            'jawaban'         => $this->jawaban,
            'urutan'          => $this->urutan ?? 0,
            'aktif'           => $this->aktif,
        ]);

        $this->flash('success', 'FAQ berhasil ditambahkan');
        return $this->redirect('/admin/faq', navigate: true);
    }
}
