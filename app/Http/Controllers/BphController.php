<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;
use App\Models\Kementrian;

class BphController extends Controller
{
    public function showChart(Request $request)
    {
        // Ambil ID kementrian yang dipilih dari request
        $id_kementrian = $request->input('id_kementrian', null);

        // Jika ID kementrian tidak ada, pilih kementrian pertama
        if (!$id_kementrian) {
            $id_kementrian = Kementrian::first()->id;
        }

        // Ambil semua kementrian
        $kementrians = Kementrian::all();

        // Ambil program kerja berdasarkan ID kementrian yang dipilih
        $programKerjas = ProgramKerja::where('id_kementrian', $id_kementrian)
                                    ->get();

        $data = [];
        foreach ($programKerjas as $proker) {
            $progressPercent = ($proker->total_progress / 10) * 100;
            $data[] = [
                'nama_proker' => $proker->nama_proker,
                'progress' => $progressPercent,
            ];
        }

        // Tambahkan variabel $kementrians dan $id_kementrian yang dipilih ke view
        return view('bph.prokerchart', compact('data', 'kementrians', 'id_kementrian'));
    }
}
