<?php

namespace App\Livewire\Admin\ListUser;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Edit extends Component
{
    use LivewireAlert;
    #[Layout('components.layouts.admin')]
    public $name, $email, $passwordLama, $passwordBaru;
    public $id;
    public $admin;
    public function mount($id)
    {
        // Ambil data admin dari database berdasarkan ID
        $this->admin = User::find($id);

        // Set nilai properti berdasarkan data admin yang ditemukan
        if ($this->admin) {
            $this->name = $this->admin->name;
            $this->email = $this->admin->email;
        }
    }
    public function save($adminId)
    {
        // Validasi input data
        $validatedData = $this->validate([
            'name' => 'required|unique:users,name,'.$adminId,
            'email' => 'required|email|min:3|unique:users,email,'.$adminId,
            'passwordLama' => 'nullable|min:3',
            'passwordBaru' => 'nullable|min:3', 
        ]);
    
        if ($validatedData) {
            $admin = User::find($adminId);
            if (!$admin) {
                // Handle jika admin tidak ditemukan
                return;
            }
    
            // Periksa apakah password lama yang dimasukkan oleh pengguna cocok dengan password di database
            if ($this->passwordLama) {
                if (!password_verify($this->passwordLama, $admin->password)) {
                    $this->addError('passwordLama', 'Password lama yang Anda masukkan tidak cocok.');
                    return;
                }
            }
    
            // Update data admin
            $admin->name = $this->name;
            $admin->email = $this->email;
    
            // Periksa apakah password baru disediakan
            if ($this->passwordBaru) {
                $admin->password = bcrypt($this->passwordBaru);
            }
    
            $admin->save();
        }
    
        $this->flash('success', 'Data berhasil diperbarui');
        return $this->redirect('/admin/list-user', navigate: true);
    }
    
    public function render()
    {
        if ($this->admin) {
            $admin = User::find($this->id);
            return view('livewire.admin.list-user.edit', compact('admin'));
        }else{
            abort(404);
        }
    }
}
