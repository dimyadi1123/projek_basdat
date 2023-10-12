<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;
use App\Models\Kementrian;
use Illuminate\Support\Facades\Auth;

class MenteriController extends Controller
{
    public function redirectToProkerChart()
    {
        // Ambil ID kementrian dari user yang sedang login
        $id_kementrian = Auth::user()->id_kementrian;

        // Arahkan ke halaman chart dengan ID kementrian tersebut
        return redirect()->route('prokerchart', ['id_kementrian' => $id_kementrian]);
    }

    public function showChart($id_kementrian)
    {
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

        return view('menteri.prokerchart', compact('data'));
    }
}
