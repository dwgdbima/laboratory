<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'name' => 'Per Hari',
                'slug' => 'per-hari',
            ],
            [
                'name' => 'Per Sampel',
                'slug' => 'per-sampel',
            ],
            [
                'name' => 'Per Titik',
                'slug' => 'per-titik',
            ],
            [
                'name' => 'Per Line',
                'slug' => 'per-line',
            ],
            [
                'name' => 'Paket A',
                'slug' => 'paket-a',
            ],
            [
                'name' => 'Paket B',
                'slug' => 'paket-b',
            ],
        ];

        foreach($units as $unit){
            Unit::create($unit);
        }
    }
}
