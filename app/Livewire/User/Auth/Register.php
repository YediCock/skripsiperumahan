<?php

namespace App\Livewire\User\Auth;

use App\Models\User;
use App\Models\Customer; // Import Customer model
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Register extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $phone; // Add phone property
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15', // Added phone validation rule
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'user',
        ]);

        // Create a new Customer record associated with the user
        Customer::create([
            'user_id' => $user->id,
            'name' => $this->name, // Customer name from the registration form
            'phone' => $this->phone, // Customer phone from the registration form
        ]);

        auth()->attempt(['email' => $this->email, 'password' => $this->password]);

        session()->regenerate();

        $this->flash('success', 'Registrasi Berhasil. Selamat datang!');
        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.user.auth.register');
    }
}
