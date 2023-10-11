<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan Admin
        Users::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'nim' => 'admin123',
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'no_telp' => '081234567890',
            'id_role' => 1, // Asumsi ID role 'Admin' adalah 1
        ]);

        // Menambahkan BPH
        for ($i = 1; $i <= 2; $i++) {
            Users::create([
                'username' => "bph$i",
                'password' => Hash::make('password'),
                'nim' => "bph$i",
                'nama' => "BPH $i",
                'email' => "bph$i@example.com",
                'no_telp' => '081234567890',
                'id_role' => 2, // Asumsi ID role 'BPH' adalah 2
            ]);
        }

        // Menambahkan Menteri
        for ($i = 1; $i <= 10; $i++) {
            Users::create([
                'username' => "menteri$i",
                'password' => Hash::make('password'),
                'nim' => "menteri$i",
                'nama' => "Menteri $i",
                'email' => "menteri$i@example.com",
                'no_telp' => '081234567890',
                'id_role' => 3, // Asumsi ID role 'Menteri' adalah 3
            ]);
        }

        // Menambahkan Anggota
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                Users::create([
                    'username' => "anggota$i-$j",
                    'password' => Hash::make('password'),
                    'nim' => "anggota$i-$j",
                    'nama' => "Anggota Kementrian $i - $j",
                    'email' => "anggota$i-$j@example.com",
                    'no_telp' => '081234567890',
                    'id_role' => 4, // Asumsi ID role 'Anggota' adalah 4
                ]);
            }
        }
    }
}
