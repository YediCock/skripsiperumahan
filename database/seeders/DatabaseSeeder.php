<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeed::class,
            HomeCategorySeeder::class,
            BlockSeeder::class,
            HomeListSeeder::class,
            CustomerSeeder::class,
            BookingSeeder::class,
            SliderSeeder::class,
            FaqSeeder::class,
        ]);

        if (!Setting::exists()) {
            Setting::create([
                'company_name'    => 'Sedayu Utama Sejahtera',
                'desc'            => '<p><strong>Sedayu Utama Sejahtera</strong> adalah pengembang perumahan terpercaya di wilayah Batang, Jawa Tengah. Kami menghadirkan hunian berkualitas dengan harga terjangkau dan lokasi strategis.</p><h4 class="mt-3 mb-2">Keunggulan Kami:</h4><ul><li>Sertifikat SHM resmi</li><li>Lokasi dekat pusat kota</li><li>Desain modern dan fungsional</li><li>Proses KPR mudah dan cepat</li></ul>',
                'phone'           => '62895414015102',
                'image_promotion' => null,
                'image_logo'      => null,
            ]);
        }
    }
}
