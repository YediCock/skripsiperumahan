<?php

namespace App\Livewire\User\Booking;

use Livewire\Component;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\Rule;
class Form extends Component
{
    use LivewireAlert;
    public $booking;
    public $wishlist;
    public $slug;
    public $phone;
    public $name;
    public function render()
    {
        return view('livewire.user.booking.form');
    }
    public function saveSession()
    {
        // Mencari pengguna berdasarkan nomor telepon dan nama
        $cekUser = Customer::where('phone', $this->phone)->where('name', $this->name)->first();
        if ($cekUser) {
            $this->validate([
                'name' => 'required',
                'phone' => ['required', 'numeric', 'digits_between:10,15'],
            ]);
            session()->put('phone', $cekUser->phone);
            session()->put('name', $cekUser->name);
            $this->flash('success', 'Berhasil masuk akun');
        } else {
            // Validasi input jika pengguna baru
            $this->validate([
                'name' => ['required','unique:customers,name'],
                'phone' => ['required', 'numeric', 'digits_between:10,15', 'unique:customers,phone'],
            ]);
            // Simpan data baru
            session()->put('phone', $this->phone); 
            session()->put('name', $this->name); 
            Customer::create([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);
            $this->flash('success', 'Berhasil menyimpan data');
        } 
        if ($this->booking) {
            // return $this->redirect('/booking', navigate: true);
            return redirect()->to('/booking');
        }elseif ($this->slug) {
            // return $this->redirect('/search/detail/'.$this->slug, navigate: true);
            return redirect()->to('/search/detail/'.$this->slug);
        }elseif ($this->wishlist) {
            // return $this->redirect('/wishlist', navigate: true);
            return redirect()->to('/wishlist');
        }
    }
}
