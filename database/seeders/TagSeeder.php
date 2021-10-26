<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Batuan',
                'slug' => 'Batuan'
            ],
            [
                'name' => 'Laboratorium',
                'slug' => 'Laboratorium'
            ],
            [
                'name' => 'Acara',
                'slug' => 'Acara'
            ],
            [
                'name' => 'Berita',
                'slug' => 'Berita'
            ],
            [
                'name' => 'Alat',
                'slug' => 'Alat'
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
