<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\karyawan;
use App\Models\Pembimbing;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'waktu',
        'tempat',
        'id_karyawan',
        'id_pembimbing',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing');
    }
}
