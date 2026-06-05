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
            $booking = Booking::find($bookingId);
            if (!$booking) {
                // Handle jika rumah tidak ditemukan
                return;
            }

            // Update data booking
            $booking->status = $this->status;

            $booking->save();

            // send wa
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
Admin Griya Sedaya Utama"; // Assuming a generic Admin Properti name
            
            $fonnteService = new FonnteService();
            $fonnteService->sendMessage($customerPhone, $message);
        }

        $this->flash('success', 'Data berhasil diperbarui');
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
