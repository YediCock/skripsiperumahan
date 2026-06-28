<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori' => 'Umum', 'urutan' => 1, 'faqs' => [
                ['pertanyaan' => 'Apa itu sistem booking online ini?',
                 'jawaban' => 'Sistem ini memudahkan Anda untuk melihat informasi unit perumahan, memilih unit yang tersedia, dan melakukan booking secara online tanpa harus datang langsung ke lokasi.'],
                ['pertanyaan' => 'Apakah saya harus membuat akun untuk melihat properti?',
                 'jawaban' => 'Tidak. Anda bisa melihat semua informasi properti tanpa akun. Namun untuk melakukan booking atau menyimpan wishlist, Anda perlu mendaftar terlebih dahulu.'],
            ]],
            ['kategori' => 'Booking Online', 'urutan' => 2, 'faqs' => [
                ['pertanyaan' => 'Bagaimana cara melakukan booking unit?',
                 'jawaban' => 'Pilih perumahan → pilih unit yang Anda inginkan → klik "Lihat Detail" → klik tombol Pesan. Tim kami akan menghubungi Anda dalam 1×24 jam untuk konfirmasi.'],
                ['pertanyaan' => 'Apakah booking online mengikat secara hukum?',
                 'jawaban' => 'Booking online merupakan pernyataan minat awal. Komitmen resmi dilakukan setelah pertemuan dan penandatanganan surat perjanjian.'],
                ['pertanyaan' => 'Bagaimana jika unit yang saya inginkan sudah terjual?',
                 'jawaban' => 'Status unit diperbarui secara berkala. Anda bisa menghubungi kami untuk mengetahui unit lain yang tersedia atau unit yang akan segera tersedia.'],
            ]],
            ['kategori' => 'Lokasi & Fasilitas', 'urutan' => 3, 'faqs' => [
                ['pertanyaan' => 'Di mana saya bisa melihat lokasi perumahan?',
                 'jawaban' => 'Informasi alamat tersedia di halaman detail setiap perumahan. Anda juga bisa menghubungi marketing kami untuk jadwal survei lokasi.'],
                ['pertanyaan' => 'Apa saja fasilitas yang tersedia di perumahan?',
                 'jawaban' => 'Fasilitas bervariasi tergantung jenis perumahan. Umumnya meliputi jalan utama beraspal, drainase, listrik PLN, dan akses air bersih. Detail tersedia di halaman masing-masing perumahan.'],
            ]],
        ];

        foreach ($data as $item) {
            $cat = FaqCategory::firstOrCreate(['name' => $item['kategori']], ['urutan' => $item['urutan']]);
            foreach ($item['faqs'] as $i => $faq) {
                $existing = Faq::firstOrCreate(
                    ['pertanyaan' => $faq['pertanyaan']],
                    array_merge($faq, ['faq_category_id' => $cat->id, 'kategori' => $item['kategori'], 'urutan' => $i + 1, 'aktif' => true])
                );
                if (!$existing->faq_category_id) {
                    $existing->update(['faq_category_id' => $cat->id, 'kategori' => $item['kategori']]);
                }
            }
        }
    }
}
