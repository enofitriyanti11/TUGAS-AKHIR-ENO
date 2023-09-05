<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'level' => 'admin'
        ]);
        User::create([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('petugas1'),
            'level' => 'petugas'
        ]);
        User::create([
            'name' => 'kepsek',
            'email' => 'kepsek@gmail.com',
            'password' => Hash::make('kepsek123'),
            'level' => 'kepala sekolah'
        ]);
    }
}
