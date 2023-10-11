<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'program_kerja';

    protected $fillable = [
        'nama_proker',
        'deskripsi',
        'periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'total_progress',
        'pic',
        'id_kementrian',
    ];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
        'created_at',
        'updated_at',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(Users::class, 'pic');
    }

    // Relasi dengan model Kementrian
    public function kementrian()
    {
        return $this->belongsTo(Kementrian::class, 'id_kementrian');
    }
}
