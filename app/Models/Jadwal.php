<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use Carbon\Carbon;

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
    protected $dates = [
        'tanggal',
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
