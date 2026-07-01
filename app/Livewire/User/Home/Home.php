<?php

namespace App\Livewire\User\Home;

use App\Models\Block;
use App\Models\Setting;
use Livewire\Component;
use App\Models\HomeList;
use App\Models\HomeCategory;

class Home extends Component
{
    public function render()
    {
        $setting = Setting::first();
        $categories = HomeCategory::take(8)->get();

        // home list sewa
        // $latestHomeListSewa = HomeList::whereHas('homeCategory', function ($query) {
        //     $query->where('slug', 'sewa');
        // })->latest()->take(4)->get();

        // home list 
        // Mengambil kategori selain sewa
        $homeCategories = HomeCategory::where('slug', '!=', 'sewa')->get();
        // Mendapatkan data terbaru untuk setiap kategori selain sewa
        $homeLists = collect(); // Inisialisasi koleksi kosong
        foreach ($homeCategories as $category) {
            // Mengambil produk terbaru dari setiap kategori
            $latestHomeLists = HomeList::with('homeCategory')->where('category_id', $category->id)
                                        ->latest()
                                        ->take(3) // Mengambil dua produk terbaru
                                        ->get();
            
            // Menambahkan produk terbaru ke koleksi
            $homeLists = $homeLists->concat($latestHomeLists);
        }
        // Mengacak urutan produk dalam koleksi
        $homeLists = $homeLists->shuffle();
        // Mengambil 8 produk pertama dari koleksi yang sudah diacak
        $CategorySelainSewa = $homeLists->take(9);

        // blok per kategori dengan jumlah unit
        $blocksByCategory = [];
        foreach ($homeCategories as $category) {
            $blocks = Block::where('home_category_id', $category->id)
                ->withCount(['homeList as unit_count' => fn($q) => $q->where('category_id', $category->id)])
                ->get();
            if ($blocks->isNotEmpty()) {
                $blocksByCategory[$category->id] = [
                    'category' => $category,
                    'blocks'   => $blocks,
                ];
            }
        }

        // ruko
        // $rukoHomes = HomeList::whereHas('homeCategory', function ($query) {
        //     $query->where('slug', 'ruko');
        // })->latest()->take(10)->get();

        // home harga dibawah 200 juta
        // $homeHarga = HomeList::where('price', '<=', 200)->latest()->take(4)->get();
        
        return view('livewire.user.home.home', compact('categories', 'CategorySelainSewa', 'setting', 'blocksByCategory'));
    }
}
