<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user dengan role siswa
        User::create([
            'name' => 'siswa01',
            'email' => 'siswa01@gmail.com',
            'username' => 'siswa01',
            'password' => Hash::make('12341234'), // Ganti dengan password yang aman
            'role' => 'siswa',  // Role siswa
        ]);

        // Membuat user dengan role guru
        User::create([
            'name' => 'guru01',
            'email' => 'guru01@gmail.com',
            'username' => 'guru01',
            'password' => Hash::make('12341234'), // Ganti dengan password yang aman
            'role' => 'guru',  // Role guru
        ]);

        // Membuat user dengan role admin
        User::create([
            'name' => 'admin01',
            'email' => 'admin01@gmail.com',
            'username' => 'admin01',
            'password' => Hash::make('12341234'), // Ganti dengan password yang aman
            'role' => 'admin', // Role admin
        ]);
    }
}
