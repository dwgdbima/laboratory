<?php

namespace Database\Seeders;

use App\Models\Detail_user;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $superAdmin->assignRole('super-admin');

        $admins = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@admin.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@admin.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin3@admin.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin)->assignRole('admin');
        }
    }
}
