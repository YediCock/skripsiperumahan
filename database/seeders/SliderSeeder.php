<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        // Placeholder — isi dengan nama file gambar nyata di storage/images/sliders/
        $images = [
            'slider_default_1.webp',
            'slider_default_2.webp',
        ];

        foreach ($images as $img) {
            Slider::firstOrCreate(['image' => $img]);
        }
    }
}
