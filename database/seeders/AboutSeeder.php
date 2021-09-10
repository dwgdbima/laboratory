<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = User::all();

        foreach ($users as $user) {
            $user->about()->create([
                'banner' => 'dummy/1920x244.jpg',
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'desc' => $faker->paragraph($nbSentences = 20, $variableNbSentences = true),
                'img' => 'dummy/563x607.jpg',
            ]);
        }
    }
}
