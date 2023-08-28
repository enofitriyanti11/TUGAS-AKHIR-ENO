<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'level' => 'admin'
        ]);
        User::create([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('1'),
            'level' => 'petugas'
        ]);
        User::create([
            'name' => 'kepsek',
            'email' => 'kepsek@gmail.com',
            'password' => Hash::make('1'),
            'level' => 'kepala sekolah'
        ]);
    }
}
