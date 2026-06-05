<?php

namespace App\Livewire\User\Booking;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Booking as bookingModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;

class Booking extends Component
{
    use LivewireAlert;
    public $phone;
    public $name;
    public $customerId;

    public function mount()
    {
        $user = Auth::user();
        $customer = $user->customer;

        $this->name = $user->name;
        $this->phone = $customer->phone;
        $this->customerId = $customer->id;
    }

    public function render()
    {
        $bookings = collect(); // Initialize as empty collection
        $customerName = $this->name; // Use the name pre-filled from authenticated user

        if ($this->customerId) {
            $bookings = bookingModel::with('homeList')
                                    ->where('customer_id', $this->customerId)
                                    ->latest()
                                    ->get();
        }

        return view('livewire.user.booking.booking',[
            'booking' => 'booking',
        ], compact('bookings', 'customerName'));
    }
}
