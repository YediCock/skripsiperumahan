<?php

namespace App\Livewire\User\Auth;

use Livewire\Component;
use Livewire\Attributes\Prop;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Logout extends Component
{
    use LivewireAlert;

    #[Prop]
    public bool $adminMode = false;

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->flash('success', 'Anda telah berhasil logout.');
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.user.auth.logout');
    }
}
