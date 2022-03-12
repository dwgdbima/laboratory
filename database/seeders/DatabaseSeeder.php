<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class,
            // AboutSeeder::class,
            // ChairmanSeeder::class,
            // ContactSeeder::class,
            // EquipmentSeeder::class,
            // TestSeeder::class,
            // PracticeSeeder::class,
            // TagSeeder::class,
            // CategorySeeder::class,
            // BlogSeeder::class,
            // ComponentSeeder::class,
            // SlideShowSeeder::class,
            CustomerStatusSeeder::class,
            UnitSeeder::class,
            ServiceSeeder::class,
            ServicePriceSeeder::class,
        ]);
    }
}
