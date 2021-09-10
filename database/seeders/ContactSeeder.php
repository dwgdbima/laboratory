<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
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
            $user->contact()->create([
                'location' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.260002183543!2d110.4070901145443!3d-7.762227179134198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599a0272fccd%3A0x39e7804d39e1d0a!2sUPN%20%22Veteran%22%20Yogyakarta!5e0!3m2!1sen!2sid!4v1631284495747!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
            ]);
        }
    }
}
