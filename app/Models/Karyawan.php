<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Karyawan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard = 'karyawan';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_karyawan', 'id');
    }
}
