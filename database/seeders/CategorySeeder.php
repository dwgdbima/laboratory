<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Berita',
                'slug' => 'berita',
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
