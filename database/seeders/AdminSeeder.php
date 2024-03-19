<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }

        $adminData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($adminData as $admin) {
            $user = User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => $admin['password'],
            ]);
            
            $user->assignRole($adminRole);
        }
    }
}
