<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\HomeCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlockSeeder extends Seeder
{
    public function run(): void
    {
        // Blok untuk Griya Sedaya Batang
        $griya = HomeCategory::where('slug', 'griya-sedaya-batang')->first();
        if ($griya) {
            foreach (['Blok A', 'Blok B', 'Blok C'] as $nama) {
                Block::firstOrCreate(
                    ['home_category_id' => $griya->id, 'name' => $nama],
                    ['slug' => Str::slug($nama . '-' . $griya->id . '-' . Str::random(4))]
                );
            }
        }

        // Blok untuk Puri Harapan Sentosa
        $puri = HomeCategory::where('slug', 'puri-harapan-sentosa')->first();
        if ($puri) {
            foreach (['Blok A', 'Blok B'] as $nama) {
                Block::firstOrCreate(
                    ['home_category_id' => $puri->id, 'name' => $nama],
                    ['slug' => Str::slug($nama . '-' . $puri->id . '-' . Str::random(4))]
                );
            }
        }

        // Blok untuk Griya Mukti Sejahtera
        $mukti = HomeCategory::where('slug', 'griya-mukti-sejahtera')->first();
        if ($mukti) {
            foreach (['Blok A', 'Blok B', 'Blok C', 'Blok D'] as $nama) {
                Block::firstOrCreate(
                    ['home_category_id' => $mukti->id, 'name' => $nama],
                    ['slug' => Str::slug($nama . '-' . $mukti->id . '-' . Str::random(4))]
                );
            }
        }
    }
}
