<?php

namespace App\Livewire\User\Booking;

use Livewire\Component;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RemoveSession extends Component
{
    use LivewireAlert;

    public $customerName;
    public $phone;
    public $name;
    public function render()
    {
        $customer = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
        if ($customer) {
            $this->customerName = $customer->name;
        } else {
            $this->customerName = null;
        }
        return view('livewire.user.booking.remove-session');
    }
    public function forgetSession()
    {
        session()->forget('phone',$this->phone);
        session()->forget('name',$this->name);
        $this->flash('success', 'Berhasil keluar akun');
        return back();
    }
}
