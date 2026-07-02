<?php

namespace App\Livewire\Admin\ListBooking;

use App\Models\Booking;
use App\Services\FonnteService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    
    #[Layout('components.layouts.admin')]
    public $search = '';
    public function render()
    {
        $bookings = Booking::latest()->search($this->search)->paginate(10);
        // dd($bookings);
        return view('livewire.admin.list-booking.index', compact('bookings'));
    }
    public function kirimPesan($id)
    {
        $booking = Booking::with(['customer', 'homeList'])->findOrFail($id);

        if (!$booking->customer || !$booking->customer->phone) {
            $this->alert('error', 'Nomor HP customer tidak tersedia');
            return;
        }

        $translatedStatus = match ($booking->status) {
            'pending' => 'Menunggu Konfirmasi',
            'process' => 'Dalam Proses',
            'accept'  => 'Diterima',
            default   => $booking->status,
        };

        $format_price = (float) $booking->homeList->getAttributes()['price'];
        $message = "Yth. Bapak/Ibu " . $booking->customer->name . ",

Status pemesanan properti Anda (" . $booking->homeList->name . ") saat ini adalah *" . $translatedStatus . "*.

Detail Pemesanan:
- Properti: " . $booking->homeList->name . "
- Harga: Rp " . number_format($format_price, 0, ',', '.') . "
- Status: *" . $translatedStatus . "*

Terima kasih atas kepercayaan Anda.

Hormat kami,
Admin";

        (new FonnteService())->sendMessage($booking->customer->phone, $message);

        $this->alert('success', 'Pesan berhasil dikirim ke ' . $booking->customer->name);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);

        // Hapus entri dari tabel booking
        $booking->delete();

        $this->alert('success', 'Berhasil menghapus booking ini');
        return back();
    }

    public function acceptBooking($id)
    {
        // 1. Cari data booking beserta relasi properti dan kategori
        $booking = Booking::with(['homeList.homeCategory'])->findOrFail($id);

        // 2. Ubah status pesanan menjadi 'accept'
        $booking->status = 'accept';
        $booking->save();

        // 3. Sinkronisasi: Ubah status properti
        if ($booking->homeList) {
            $homeList = $booking->homeList;
            
            // Cek apakah kategorinya sewa dengan lebih aman
            $isSewa = ($homeList->homeCategory && $homeList->homeCategory->slug == 'sewa');
            
            // Tentukan status ('tersewa' atau 'terjual')
            $homeList->status = $isSewa ? 'tersewa' : 'terjual';
            
            // Paksa simpan ke database menggunakan save()
            $homeList->save();
        }

        // 4. Berikan notifikasi sukses ke Admin
        $this->alert('success', 'Pesanan berhasil di-ACC. Status properti otomatis menjadi ' . strtoupper($homeList->status ?? ''));
    }
}
