<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeed::class);

        // admin
        $setting = new Setting();
        $setting->company_name = 'Perumahan Griya Nusantara';
        $setting->desc = '<p><strong>Perumahan Griya Nusantara</strong> , hunian berkonsep rumah tumbuh dengan sentuhan desain yang modern. Berlokasi di perbatasan Gading Serpong dan BSD, Perumahan Griya Nusantara dilengkapi dengan berbagai fasilitas cluster seperti Club House, Kolam Renang, Lapangan Basket serta lingkungan rumah yang nyaman. Untuk memudahkan Anda dan keluarga, Perumahan Griya Nusantara juga dikeliling berbagai fasilitas kota yang lengkap seperti rumah sakit, sekolah, pusat perbelanjaan dan perkantoran.</p>
        <h4 class="mt-3 mb-2">Keunggulan dari Perumahan Griya Nusantara:</h4>
        
            <li>Terletak di kawasan premium Gading Serpong,</li>
            <li>500 meter dari Jalan Boulevard Gading Serpong</li>
            <li>Desain rumah yang cantik dengan konsep modern classic.</li>
        
        <h4 class="mt-3 mb-2">Fasilitas cluster yang lengkap:</h4>
        
            <li>Suasana lingkungan yang sejuk dan asri.</li>
            <li>5 menit ke Bethsaida Hospital, Giant, Pasar Modern, BEZ Plaza, Aeon Mall, dan Indonesia Convention Exhibition (ICE).</li>
        
        <p>Lokasi : Jalan Hudson, Cijantra, Pagedangan, Tangerang, Banten 15336.</p>
        
        
        ';
        $setting->phone = '6285176720024';
        $setting->image_promotion = '1714622279_image_promosi1.png';
        $setting->image_logo = "logo_perumahan1.png";
        $setting->save();

    }
}
