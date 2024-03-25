<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'feedback',
        'id_report',
        'id_pembimbing',
        'id_karyawan',
    ];
    public function report()
    {
        return $this->belongsTo(Report::class, 'id_report');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing');
    }

}
