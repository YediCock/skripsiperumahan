<?php

namespace App\Livewire\User\Wishlist;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Wishlist as WishlistModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
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
        $wishlists = collect(); // Initialize as empty collection
        $customerName = $this->name;

        if ($this->customerId) {
            $wishlists = WishlistModel::with('homeList')
                                    ->where('customer_id', $this->customerId)
                                    ->latest()
                                    ->get();
        }

        return view('livewire.user.wishlist.wishlist',[
            'wishlist' => 'wishlist',
        ], compact('wishlists','customerName'));
    }

    // fitur delete list wistlist
    public function delete($id)
    {
        $user = Auth::user();
        $customer = $user->customer;

        if ($customer) {
            $wishlist = WishlistModel::where('customer_id', $customer->id)
                                    ->whereHas('homeList', function ($query) use ($id) {
                                        $query->where('id', $id);
                                    })->first();

            if ($wishlist) {
                $wishlist->delete();
                $this->alert('success', 'Berhasil dihapus dari daftar wishlist Anda');
            } else {
                $this->alert('error', 'Item wishlist tidak ditemukan atau Anda tidak memiliki akses.');
            }
        } else {
            $this->alert('error', 'Terjadi kesalahan: Data pelanggan tidak ditemukan.');
        }

        return back();
    }
}
