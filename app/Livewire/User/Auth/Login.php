<?php

namespace App\Livewire\User\Auth;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;
    public $name;
    public $password;
    protected $rules = [
        'name'     => 'required',
        'password'  => 'required',
    ];
    public function proccesslogin()
    {
        $this->validate();

        $credentials = array(
            'name' =>  $this->name,
            'password' =>  $this->password
        );

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            $this->flash('success', 'Login Berhasil');

            if (auth()->user()->role == 'admin') {
                return redirect('/admin/list-user');
            } else {
                return redirect('/');
            }
        }

        $this->reset();
        $this->alert('error', 'Name atau Password salah');
        return back();
    }
    public function render()
    {
        return view('livewire.user.auth.login');
    }
}
