<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Kementrian;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mendapatkan ID kementrian yang sudah di-seed
        $kementrianId = Kementrian::first()->id;

        // Contoh data yang akan di-seed
        Role::create([
            'nama_role' => 'Admin',
            'periode' => 2023,
            'id_kementrian' => $kementrianId
        ]);

        Role::create([
            'nama_role' => 'BPH',
            'periode' => 2023,
            'id_kementrian' => $kementrianId
        ]);

        Role::create([
            'nama_role' => 'Anggota',
            'periode' => 2023,
            'id_kementrian' => $kementrianId
        ]);

        Role::create([
            'nama_role' => 'Menteri',
            'periode' => 2023,
            'id_kementrian' => $kementrianId
        ]);

        // Tambahkan data seeder lainnya sesuai kebutuhan
    }
}
