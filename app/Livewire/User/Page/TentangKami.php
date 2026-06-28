<?php

namespace App\Livewire\User\Page;

use App\Models\Setting;
use App\Models\HomeCategory;
use Livewire\Component;

class TentangKami extends Component
{
    public function render()
    {
        $setting    = Setting::first();
        $categories = HomeCategory::withCount('homeList')->get();
        $totalUnits = $categories->sum('home_list_count');

        return view('livewire.user.page.tentang-kami', compact('setting', 'categories', 'totalUnits'));
    }
}
