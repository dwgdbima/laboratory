<?php

namespace Database\Seeders;

use App\Models\Chairman;
use Illuminate\Database\Seeder;

class ChairmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chairman::create([
            'name' => 'Prof. Dr. Alex Johanson',
            'title' => 'Ketua Laboratorium Jurusan Pertambangan UPN Veteran Yogyakarta',
            'greeting' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam dignissimos ratione laborum nihil porro reprehenderit cumque asperiores ipsa fugiat excepturi, officia minima itaque iste quia voluptatem quidem suscipit similique vero.',
            'email' => 'test@test.com',
            'photo' => 'dummy/460x570.jpg',
            'social_media' => [
                [
                    'icon' => 'fab fa-facebook-f',
                    'name' => 'facebook',
                    'url' => '#'
                ],
                [
                    'icon' => 'fab fa-twitter',
                    'name' => 'twitter',
                    'url' => '#'
                ],
                [
                    'icon' => 'fab fa-instagram',
                    'name' => 'instagram',
                    'url' => '#'
                ]
            ],
        ]);
    }
}
