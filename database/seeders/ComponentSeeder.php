<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Component::create([
            'icon' => 'dist/user/images/logo.png',
            'favicon' => 'dist/user/images/logo.png',
            'banner' => 'dummy/1920x244.jpg',
        ]);
    }
}
