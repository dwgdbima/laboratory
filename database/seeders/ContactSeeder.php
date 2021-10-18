<?php

namespace Database\Seeders;

use App\Models\Contact;
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
        Contact::create([
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2599521926973!2d110.40709011474836!3d-7.762232494405607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599a0272fccd%3A0x39e7804d39e1d0a!2sUPN%20%22Veteran%22%20Yogyakarta!5e0!3m2!1sen!2sid!4v1634049980542!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'phone' => '+62 81-2345-678',
            'email' => 'jurusanpertambangan@upn.com',
            'social_media' => [
                [
                    'icon' => 'fa fa-facebook',
                    'name' => 'facebook',
                    'url' => '#'
                ],
                [
                    'icon' => 'fa fa-twitter',
                    'name' => 'twitter',
                    'url' => '#'
                ],
                [
                    'icon' => 'fa fa-google-plus',
                    'name' => 'google+',
                    'url' => '#'
                ],
                [
                    'icon' => 'fa fa-linkedin',
                    'name' => 'linkedin',
                    'url' => '#'
                ],
            ]
        ]);
    }
}
