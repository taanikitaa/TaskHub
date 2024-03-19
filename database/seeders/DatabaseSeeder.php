<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);

        $this->call(PermissionSeeder::class);

        $adminRole = Role::where('name', 'admin')->first();
        $pembimbingRole = Role::where('name', 'pembimbing')->first();
        $karyawanRole = Role::where('name', 'karyawan pkl')->first();

        $adminPermissions = [
            'manage admin data',
            'manage pembimbing data',
            'manage karyawan data',
            'manage task data',
            'manage report task data',
            'manage jadwal data',
        ];

        $pembimbingPermissions = [
            'manage karyawan data',
            'manage task data',
            'manage report task data',
            'manage jadwal data',
        ];

        $karyawanPermissions = [
            'manage task',
            'manage report task',
            'manage jadwal',
        ];

        $adminRole->givePermissionTo($adminPermissions);
        $pembimbingRole->givePermissionTo($pembimbingPermissions);
        $karyawanRole->givePermissionTo($karyawanPermissions);

        $this->call(AdminSeeder::class);
    }
}
