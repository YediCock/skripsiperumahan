<?php

namespace App\Livewire\Admin\ListUser;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
class Add extends Component
{
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $name, $email, $password;
    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|min:3|unique:users',
            'password' => 'required|min:3'
        ]);

        if ($validatedData) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }
        $this->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/admin/list-user', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.list-user.add');
    }
}
