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
                'slug' => 'batuan'
            ],
            [
                'name' => 'Laboratorium',
                'slug' => 'laboratorium'
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara'
            ],
            [
                'name' => 'Berita',
                'slug' => 'slug'
            ],
            [
                'name' => 'Alat',
                'slug' => 'alat'
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
