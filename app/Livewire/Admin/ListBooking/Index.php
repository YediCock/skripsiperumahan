<?php

namespace App\Livewire\Admin\ListBooking;

use App\Models\Booking;
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
        return view('livewire.admin.list-booking.index', compact('bookings'));
    }
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);

        // Hapus entri dari tabel booking
        $booking->delete();

        $this->alert('success', 'Berhasil menghapus booking ini');
        return back();
    }
}
