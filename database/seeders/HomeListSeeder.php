<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\HomeCategory;
use App\Models\HomeImage;
use App\Models\HomeList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeListSeeder extends Seeder
{
    public function run(): void
    {
        // Tipe rumah template
        $tipes = [
            ['luas_tanah' => 72, 'luas_bangunan' => 36, 'kt' => 2, 'km' => 1, 'listrik' => 900,  'harga' => 250],
            ['luas_tanah' => 84, 'luas_bangunan' => 45, 'kt' => 2, 'km' => 1, 'listrik' => 1300, 'harga' => 320],
            ['luas_tanah' => 96, 'luas_bangunan' => 60, 'kt' => 3, 'km' => 2, 'listrik' => 1300, 'harga' => 420],
            ['luas_tanah' => 120,'luas_bangunan' => 78, 'kt' => 3, 'km' => 2, 'listrik' => 2200, 'harga' => 560],
        ];

        // -------------------------------------------------------
        // Griya Sedaya Batang — Blok A (4 unit), B (4 unit), C (3 unit)
        // -------------------------------------------------------
        $griya   = HomeCategory::where('slug', 'griya-sedaya-batang')->first();
        $blokGSB = Block::where('home_category_id', $griya?->id)->get()->keyBy('name');

        $unitsPlan = [
            'Blok A' => ['A1','A2','A3','A4'],
            'Blok B' => ['B1','B2','B3','B4'],
            'Blok C' => ['C1','C2','C3'],
        ];

        $statusList = ['dijual','dijual','dijual','terjual'];
        $tipeIndex  = 0;

        foreach ($unitsPlan as $blokNama => $units) {
            $blok = $blokGSB[$blokNama] ?? null;
            foreach ($units as $idx => $unitNo) {
                $tipe   = $tipes[$tipeIndex % count($tipes)];
                $status = $statusList[$idx % count($statusList)];
                $name   = "Rumah Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']} {$blokNama} {$unitNo} - Griya Sedaya";
                $slug   = Str::slug($name . '-' . Str::random(4));

                $home = HomeList::firstOrCreate(['slug' => $slug], [
                    'category_id'        => $griya->id,
                    'block_id'           => $blok?->id,
                    'unit_number'        => $unitNo,
                    'name'               => $name,
                    'slug'               => $slug,
                    'desc'               => "<p>Unit {$unitNo} {$blokNama} di Perumahan Griya Sedaya Batang. Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']} dengan {$tipe['kt']} kamar tidur dan {$tipe['km']} kamar mandi. Dilengkapi carport, taman depan, dan akses jalan aspal.</p>",
                    'land_area'          => $tipe['luas_tanah'],
                    'building_area'      => $tipe['luas_bangunan'],
                    'number_of_bedrooms' => $tipe['kt'],
                    'number_of_bathrooms'=> $tipe['km'],
                    'electrical_power'   => $tipe['listrik'],
                    'price'              => $tipe['harga'],
                    'status'             => $status,
                    'floorplan'          => null,
                    'sketch_image'       => null,
                ]);

                $tipeIndex++;
            }
        }

        // -------------------------------------------------------
        // Puri Harapan Sentosa — Blok A (3 unit), B (3 unit)
        // -------------------------------------------------------
        $puri    = HomeCategory::where('slug', 'puri-harapan-sentosa')->first();
        $blokPHS = Block::where('home_category_id', $puri?->id)->get()->keyBy('name');

        $unitsPHS = [
            'Blok A' => ['A1','A2','A3'],
            'Blok B' => ['B1','B2','B3'],
        ];

        $tipeIndex = 1;
        foreach ($unitsPHS as $blokNama => $units) {
            $blok = $blokPHS[$blokNama] ?? null;
            foreach ($units as $idx => $unitNo) {
                $tipe   = $tipes[$tipeIndex % count($tipes)];
                $status = $idx === 2 ? 'terjual' : 'dijual';
                $name   = "Rumah Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']} {$blokNama} {$unitNo} - Puri Harapan";
                $slug   = Str::slug($name . '-' . Str::random(4));

                HomeList::firstOrCreate(['slug' => $slug], [
                    'category_id'        => $puri->id,
                    'block_id'           => $blok?->id,
                    'unit_number'        => $unitNo,
                    'name'               => $name,
                    'slug'               => $slug,
                    'desc'               => "<p>Unit {$unitNo} {$blokNama} di Perumahan Puri Harapan Sentosa. Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']} dengan {$tipe['kt']} kamar tidur dan {$tipe['km']} kamar mandi.</p>",
                    'land_area'          => $tipe['luas_tanah'],
                    'building_area'      => $tipe['luas_bangunan'],
                    'number_of_bedrooms' => $tipe['kt'],
                    'number_of_bathrooms'=> $tipe['km'],
                    'electrical_power'   => $tipe['listrik'],
                    'price'              => $tipe['harga'],
                    'status'             => $status,
                    'floorplan'          => null,
                    'sketch_image'       => null,
                ]);

                $tipeIndex++;
            }
        }

        // -------------------------------------------------------
        // Griya Mukti Sejahtera — Blok A–D (3 unit per blok)
        // -------------------------------------------------------
        $mukti   = HomeCategory::where('slug', 'griya-mukti-sejahtera')->first();
        $blokGMS = Block::where('home_category_id', $mukti?->id)->get()->keyBy('name');

        $blokHuruf = ['A','B','C','D'];
        $tipeIndex = 0;
        foreach ($blokHuruf as $huruf) {
            $blok = $blokGMS["Blok {$huruf}"] ?? null;
            foreach ([1,2,3] as $no) {
                $unitNo = "{$huruf}{$no}";
                $tipe   = $tipes[$tipeIndex % count($tipes)];
                $status = $no === 3 ? 'dijual' : ($tipeIndex % 5 === 0 ? 'terjual' : 'dijual');
                $name   = "Rumah Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']} Blok {$huruf} {$unitNo} - Mukti Sejahtera";
                $slug   = Str::slug($name . '-' . Str::random(4));

                HomeList::firstOrCreate(['slug' => $slug], [
                    'category_id'        => $mukti->id,
                    'block_id'           => $blok?->id,
                    'unit_number'        => $unitNo,
                    'name'               => $name,
                    'slug'               => $slug,
                    'desc'               => "<p>Unit {$unitNo} Blok {$huruf} di Perumahan Griya Mukti Sejahtera. Tipe {$tipe['luas_bangunan']}/{$tipe['luas_tanah']}.</p>",
                    'land_area'          => $tipe['luas_tanah'],
                    'building_area'      => $tipe['luas_bangunan'],
                    'number_of_bedrooms' => $tipe['kt'],
                    'number_of_bathrooms'=> $tipe['km'],
                    'electrical_power'   => $tipe['listrik'],
                    'price'              => $tipe['harga'],
                    'status'             => $status,
                    'floorplan'          => null,
                    'sketch_image'       => null,
                ]);

                $tipeIndex++;
            }
        }

        // -------------------------------------------------------
        // Sewa — 3 unit tanpa blok
        // -------------------------------------------------------
        $sewa = HomeCategory::where('slug', 'sewa')->first();
        if ($sewa) {
            $sewaUnits = [
                ['name' => 'Rumah Kontrakan Tipe 36 — Kandeman', 'harga' => 10, 'kt' => 2, 'km' => 1, 'lt' => 72,  'lb' => 36],
                ['name' => 'Rumah Kontrakan Tipe 45 — Batang Kota', 'harga' => 15, 'kt' => 2, 'km' => 1, 'lt' => 84,  'lb' => 45],
                ['name' => 'Rumah Kontrakan Tipe 60 — Subah',  'harga' => 18, 'kt' => 3, 'km' => 2, 'lt' => 96,  'lb' => 60],
            ];
            foreach ($sewaUnits as $u) {
                $slug = Str::slug($u['name'] . '-' . Str::random(4));
                HomeList::firstOrCreate(['name' => $u['name']], [
                    'category_id'        => $sewa->id,
                    'block_id'           => null,
                    'unit_number'        => null,
                    'name'               => $u['name'],
                    'slug'               => $slug,
                    'desc'               => "<p>{$u['name']}. {$u['kt']} kamar tidur, {$u['km']} kamar mandi.</p>",
                    'land_area'          => $u['lt'],
                    'building_area'      => $u['lb'],
                    'number_of_bedrooms' => $u['kt'],
                    'number_of_bathrooms'=> $u['km'],
                    'electrical_power'   => 1300,
                    'price'              => $u['harga'],
                    'status'             => 'sewa',
                    'floorplan'          => null,
                    'sketch_image'       => null,
                ]);
            }
        }
    }
}
