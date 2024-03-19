<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'pembimbing', 'guard_name' => 'web']);
        Role::create(['name' => 'karyawan pkl', 'guard_name' => 'web']);
    }
}

