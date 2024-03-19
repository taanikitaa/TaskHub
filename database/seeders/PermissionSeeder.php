<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage admin data',
            'manage pembimbing data',
            'manage karyawan data',
            'manage task data',
            'manage task',
            'manage report task data',
            'manage report task',
            'manage jadwal data',
            'manage jadwal',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}

