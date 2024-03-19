<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pembimbing extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    protected $guard = 'pembimbing';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class, 'id_pembimbing', 'id');
    }
    
}

