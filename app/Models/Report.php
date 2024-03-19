<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use App\Models\Task;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'nama_report',
        'tanggal_report',
        'id_karyawan',
        'id_pembimbing',
        'id_task',
        'dokumen',
        'link_video', 
        'status',
    ];

    

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'id_task', 'id');
    }
}
