<?php

namespace App\Livewire\User\Page;

use App\Models\FaqCategory;
use Livewire\Component;

class Faq extends Component
{
    public function render()
    {
        $faqCategories = FaqCategory::with(['faqs' => fn($q) => $q->where('aktif', true)->orderBy('urutan')])
                                    ->orderBy('urutan')
                                    ->get()
                                    ->filter(fn($cat) => $cat->faqs->isNotEmpty());
        return view('livewire.user.page.faq', compact('faqCategories'));
    }
}
