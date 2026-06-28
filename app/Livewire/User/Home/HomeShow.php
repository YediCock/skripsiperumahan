<?php

namespace App\Livewire\User\Home;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Customer;
use App\Models\HomeList;
use App\Models\Wishlist;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class HomeShow extends Component
{
    use LivewireAlert;
    public $slug;
    public $phone;
    public $name;
    public $isOpen = false;
    // fitur tambah pesan
    public function pesan()
    {
        $customerId = null;

        if (auth()->check()) {
            $user = auth()->user();
            $customer = Customer::firstOrCreate(
                ['user_id' => $user->id],
                ['name' => $user->name, 'phone' => '0'] 
            );
            $customerId = $customer->id;
        } elseif (session()->has(['phone','name'])) {
            $cekUser = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
            if ($cekUser) {
                $customerId = $cekUser->id;
            }
        }

        if (!$customerId) {
            $this->alert('error', 'Anda harus login atau mengisi data diri untuk memesan.');
            return;
        }

        $home = HomeList::where('slug', $this->slug)->firstOrFail();
        if ($home->status === 'terjual' || $home->status === 'tersewa') {
            $this->alert('warning', 'Rumah ini sudah terjual atau sudah tersewa. Anda tidak dapat memesannya.');
            return;
        }

        $homeId = $home->id;
        $bookingExists = Booking::where('home_id', $homeId)
                                ->where('customer_id', $customerId)
                                ->exists();

        if ($bookingExists) {
            $this->alert('error', 'Anda sudah memesan rumah ini sebelumnya.');
            return;
        }
        
        Booking::create([
            'home_id' => $homeId,
            'customer_id' => $customerId,
        ]);

        $this->flash('success', 'Pesan properti ini berhasil ditambahkan');
        return $this->redirect('/booking', navigate: true);
    }

    // fitur tambah wishlist
    public function wishlist()
    {
        $customerId = null;

        if (auth()->check()) {
            $user = auth()->user();
            $customer = Customer::firstOrCreate(
                ['user_id' => $user->id],
                ['name' => $user->name, 'phone' => '0'] // Default phone, user should update it
            );
            $customerId = $customer->id;
        } elseif (session()->has(['phone','name'])) {
            $cekUser = Customer::where('phone', session()->get('phone'))->where('name', session()->get('name'))->first();
            if ($cekUser) {
                $customerId = $cekUser->id;
            }
        }

        if (!$customerId) {
            $this->alert('error', 'Anda harus login atau mengisi data diri untuk menambahkan ke wishlist.');
            return;
        }

        $home = HomeList::where('slug', $this->slug)->firstOrFail();
        $wishlistExists = Wishlist::where('home_id', $home->id)
                                ->where('customer_id', $customerId)
                                ->exists();

        if ($wishlistExists) {
            $this->alert('error', 'Sudah ada di daftar wishlist Anda');
            return;
        }

        Wishlist::create([
            'home_id' => $home->id,
            'customer_id' => $customerId,
        ]);

        $this->alert('success', 'Berhasil dimasukan kedalam daftar wishlist Anda');
    }
    public function render()
    {
        $user = auth()->user();
        $slug = $this->slug;
        $homes    = HomeList::where('slug', $this->slug)->firstOrFail();
        $kategori = $homes->homeCategory->id;
        $propertiSamaKategori = HomeList::where('category_id', $kategori)->take(10)->get();

        $alreadyBooked = false;
        if (auth()->check()) {
            $customer = \App\Models\Customer::where('user_id', auth()->id())->first();
            if ($customer) {
                $alreadyBooked = \App\Models\Booking::where('home_id', $homes->id)
                    ->where('customer_id', $customer->id)
                    ->exists();
            }
        }

        return view('livewire.user.home.home-show', compact('homes', 'propertiSamaKategori', 'slug', 'alreadyBooked'));
    }
    public function openForm()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
}