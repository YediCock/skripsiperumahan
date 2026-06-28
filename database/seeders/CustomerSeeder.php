<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun user biasa + customer-nya
        $users = [
            ['name' => 'Budi Santoso',  'email' => 'budi@example.com',  'phone' => '081234567890'],
            ['name' => 'Siti Rahayu',   'email' => 'siti@example.com',  'phone' => '082345678901'],
            ['name' => 'Agus Wijaya',   'email' => 'agus@example.com',  'phone' => '083456789012'],
        ];

        foreach ($users as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name'     => $data['name'],
                    'password' => bcrypt('password'),
                    'role'     => 'user',
                ]
            );

            Customer::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name'  => $data['name'],
                    'phone' => $data['phone'],
                ]
            );
        }
    }
}
