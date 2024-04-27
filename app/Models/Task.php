<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Pembimbing;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_task',
        'deadline',
        'level',
        'id_karyawan',
        'id_pembimbing',
    ];
    public function report()
    {
        return $this->hasOne(Report::class, 'id_task', 'id');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id');
    }

    public function Pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing','id');
    }
}
