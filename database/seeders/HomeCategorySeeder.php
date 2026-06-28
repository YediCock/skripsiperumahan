<?php

namespace Database\Seeders;

use App\Models\HomeCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'            => 'Griya Sedaya Batang',
                'slug'            => 'griya-sedaya-batang',
                'address'         => 'Jl. Raya Kandeman No.12, Batang, Jawa Tengah',
                'image'           => null,
                'brochure_image'  => null,
                'site_plan_image' => null,
            ],
            [
                'name'            => 'Puri Harapan Sentosa',
                'slug'            => 'puri-harapan-sentosa',
                'address'         => 'Jl. Puri Sentosa, Kandeman, Batang, Jawa Tengah 51264',
                'image'           => null,
                'brochure_image'  => null,
                'site_plan_image' => null,
            ],
            [
                'name'            => 'Griya Mukti Sejahtera',
                'slug'            => 'griya-mukti-sejahtera',
                'address'         => 'Jl. Mukti Raya, Subah, Batang, Jawa Tengah',
                'image'           => null,
                'brochure_image'  => null,
                'site_plan_image' => null,
            ],
            [
                'name'            => 'Sewa',
                'slug'            => 'sewa',
                'address'         => null,
                'image'           => null,
                'brochure_image'  => null,
                'site_plan_image' => null,
            ],
        ];

        foreach ($categories as $cat) {
            HomeCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
