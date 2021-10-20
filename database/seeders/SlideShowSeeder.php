<?php

namespace Database\Seeders;

use App\Models\SlideShow;
use Illuminate\Database\Seeder;

class SlideShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SlideShow::create([
            'slide_1' => 'dummy/1920x670.jpg',
            'slide_2' => 'dummy/1920x670.jpg',
        ]);
    }
}
