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
        $users = [
            [
                'name' => 'Fakultas Teknologi Mineral UPNYK',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
            [
                'name' => 'Jurusan Teknik Pertambangan UPNYK',
                'email' => 'teknikpertambangan@admin.com',
                'password' => Hash::make('password'),
                'role' => 2
            ],
            [
                'name' => 'Jurusan Teknik Geologi UPNYK',
                'email' => 'teknikgeologi@admin.com',
                'password' => Hash::make('password'),
                'role' => 2
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
