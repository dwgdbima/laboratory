<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perpetaan = Laboratory::where('slug', 'perpetaan')->first();
        $perpetaan->equipment()->createMany([
            [
                'name' => 'Theodolite Nikon 101',
                'desc' => 'Theodolit adalah salah satu alat ukur tanah yang digunakan untuk menentukan tinggi tanah dengan sudut horizontal dan sudut vertikal.',
                'image' => 'https://via.placeholder.com/460x570.jpg',
            ],
            [
                'name' => 'Theodolite Sokkia DT 600',
                'desc' => 'Theodolit adalah salah satu alat ukur tanah yang digunakan untuk menentukan tinggi tanah dengan sudut horizontal dan sudut vertikal.',
                'image' => 'https://via.placeholder.com/460x570.jpg',
            ],
            [
                'name' => 'Theodolite Topcon',
                'desc' => 'Theodolit adalah salah satu alat ukur tanah yang digunakan untuk menentukan tinggi tanah dengan sudut horizontal dan sudut vertikal.',
                'image' => 'https://via.placeholder.com/460x570.jpg',
            ],
            [
                'name' => 'Total Station',
                'desc' => '2.	Total Station adalah instrumen optis/elektronik yang digunakan dalam pemetaan dan konstruksi bangunan. Total station adalah alat ukur sudut dan jarak yang terintegrasi dalam satu unit alat.',
                'image' => 'https://via.placeholder.com/460x570.jpg',
            ],
        ]);
    }
}
