<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KementrianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menentukan jumlah data yang ingin disisipkan
        $jumlahData = 10;

        for ($i = 1; $i <= $jumlahData; $i++) {
            DB::table('kementrian')->insert([
                'nama_kementrian' => "Kementrian $i",
                'deskripsi' => "Deskripsi Kementrian $i",
                'periode' => 2023
            ]);
        }
    }
}
