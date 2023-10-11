<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramKerja;
use App\Models\Users;
use App\Models\Kementrian;

class ProgramKerjaSeeder extends Seeder
{
    public function run()
    {
        $kementrians = Kementrian::all();

        foreach ($kementrians as $kementrian) {
            for ($i = 1; $i <= 10; $i++) {
                $pic = Users::where('id_role', '!=', 1) // Memilih user yang bukan Admin sebagai PIC
                    ->inRandomOrder()
                    ->first();

                ProgramKerja::create([
                    'nama_proker' => "Program Kerja $i",
                    'deskripsi' => "Deskripsi Program Kerja $i",
                    'periode' => 2023,
                    'tanggal_mulai' => '2023-01-01',
                    'tanggal_selesai' => '2023-12-31',
                    'total_progress' => rand(1, 10),
                    'pic' => $pic->id,
                    'id_kementrian' => $kementrian->id,
                ]);
            }
        }
    }
}
