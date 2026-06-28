<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $search = '';

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $faqs = Faq::when($this->search, fn($q) => $q->where('pertanyaan', 'like', '%'.$this->search.'%')
                                                      ->orWhere('kategori', 'like', '%'.$this->search.'%'))
                   ->orderBy('kategori')->orderBy('urutan')->orderBy('id')
                   ->paginate(15);

        return view('livewire.admin.faq.index', compact('faqs'));
    }

    public function toggleAktif($id)
    {
        $faq = Faq::find($id);
        if ($faq) {
            $faq->aktif = !$faq->aktif;
            $faq->save();
        }
        $this->alert('success', 'Status FAQ diperbarui');
    }

    public function deleteFaq($id)
    {
        Faq::find($id)?->delete();
        $this->alert('success', 'FAQ berhasil dihapus');
    }
}
