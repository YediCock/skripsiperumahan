<?php

namespace App\Livewire\Admin\ListBooking;

use App\Models\Booking;
use App\Services\FonnteService;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    
    #[Layout('components.layouts.admin')]
    public $status;
    public $id;
    public $booking;

    public function mount($id)
    {
        $this->id = $id; // Simpan ID agar bisa dipanggil di render
        // Ambil data rumah dari database berdasarkan ID
        $this->booking = Booking::find($id);

        // Set nilai properti berdasarkan data rumah yang ditemukan
        if ($this->booking) {
            $this->status = $this->booking->status;
        }
    }

    public function save($bookingId)
    {
        $validatedData = $this->validate([
            'status' => 'required|in:pending,process,accept',
        ]);

        if ($validatedData) {
            // Panggil booking beserta relasinya agar tidak terjadi error saat load data
            $booking = Booking::with(['homeList.homeCategory', 'customer'])->find($bookingId);
            
            if (!$booking) {
                // Handle jika pesanan tidak ditemukan
                return;
            }

            // 1. Update data status booking
            $booking->status = $this->status;
            $booking->save();

            // 2. SINKRONISASI STATUS PROPERTI (Logika Baru)
            if ($booking->homeList) {
                $homeList = $booking->homeList;
                $isSewa = ($homeList->homeCategory && $homeList->homeCategory->slug == 'sewa');

                if ($this->status === 'accept') {
                    // Jika di-ACC, ubah jadi Terjual / Tersewa
                    $homeList->status = $isSewa ? 'tersewa' : 'terjual';
                } else {
                    // Jika dikembalikan ke Pending/Process, kembalikan ke Dijual / Sewa
                    $homeList->status = $isSewa ? 'sewa' : 'dijual';
                }
                
                $homeList->save();
            }

            // 3. send wa
            $customerPhone = $booking->customer->phone;
            
            $translatedStatus = match ($this->status) {
                'pending' => 'Menunggu Konfirmasi',
                'process' => 'Dalam Proses',
                'accept' => 'Diterima',
                default => $this->status, // Fallback if status is unrecognized
            };
            
            $format_price = (float) $booking->homeList->getAttributes()['price'];
            $message = "Yth. Bapak/Ibu " . $booking->customer->name . ",

Status pemesanan properti Anda (" . $booking->homeList->name . ") telah diperbarui menjadi *" . $translatedStatus . "*.

Detail Pemesanan:
- Properti: " . $booking->homeList->name . "
- Harga: Rp " . number_format($format_price, 0, ',', '.') . "
- Status Terbaru: *" . $translatedStatus . "*

Terima kasih atas kepercayaan Anda.

Hormat kami,
Admin Griya Sedaya Utama";
            
            $fonnteService = new FonnteService();
            $fonnteService->sendMessage($customerPhone, $message);
        }

        $this->flash('success', 'Data pemesanan dan properti berhasil diperbarui');
        return $this->redirect('/admin/list-booking', navigate: true);
    }

    public function render()
    {
        if ($this->booking) {
            $booking = Booking::find($this->id);
            return view('livewire.admin.list-booking.edit', compact('booking'));
        } else {
            abort(404);
        }
    }
}