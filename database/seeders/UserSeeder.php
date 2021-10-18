<?php

namespace Database\Seeders;

use App\Models\Detail_user;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $superAdmin->assignRole('super-admin');

        // Perpetaan

        $perpetaan = User::create([
            'name' => 'Admin Laboratorium Perpetaan',
            'email' => 'perpetaan@admin.com',
            'password' => Hash::make('password'),
        ]);

        $perpetaan->assignRole('admin');

        $perpetaan->laboratory()->create([
            'name' => 'Laboratorium Perpetaan',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'perpetaan',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Mekanika Tanah

        $mekanikatanah = User::create([
            'name' => 'Admin Laboratorium Mekanika Tanah',
            'email' => 'mekanikatanah@admin.com',
            'password' => Hash::make('password'),
        ]);

        $mekanikatanah->assignRole('admin');

        $mekanikatanah->laboratory()->create([
            'name' => 'Laboratorium Mekanika Tanah',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'mekanika-tanah',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Batubara

        $batubara = User::create([
            'name' => 'Admin Laboratorium Batubara',
            'email' => 'batubara@admin.com',
            'password' => Hash::make('password'),
        ]);

        $batubara->assignRole('admin');

        $batubara->laboratory()->create([
            'name' => 'Laboratorium Batubara',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'batubara',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Geofisika Tambang

        $geofisikatambang = User::create([
            'name' => 'Admin Laboratorium Geofisika Tambang',
            'email' => 'geofisikatambang@admin.com',
            'password' => Hash::make('password'),
        ]);

        $geofisikatambang->assignRole('admin');

        $geofisikatambang->laboratory()->create([
            'name' => 'Laboratorium Geofisika Tambang',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'geofisika-tambang',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Ventilasi Tambang

        $ventilasitambang = User::create([
            'name' => 'Admin Laboratorium Ventilasi Tambang',
            'email' => 'ventilasitambang@admin.com',
            'password' => Hash::make('password'),
        ]);

        $ventilasitambang->assignRole('admin');

        $ventilasitambang->laboratory()->create([
            'name' => 'Laboratorium Ventilasi Tambang',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'ventilasi-tambang',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Peledakan

        $peledakan = User::create([
            'name' => 'Admin Laboratorium Peledakan',
            'email' => 'peledakan@admin.com',
            'password' => Hash::make('password'),
        ]);

        $peledakan->assignRole('admin');

        $peledakan->laboratory()->create([
            'name' => 'Laboratorium Peledakan',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'peledakan',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Simulasi Komputasi Tambang

        $simulasikomputasitambang = User::create([
            'name' => 'Admin Laboratorium Simulasi Komputasi Tambang',
            'email' => 'simulasikomputasitambang@admin.com',
            'password' => Hash::make('password'),
        ]);

        $simulasikomputasitambang->assignRole('admin');

        $simulasikomputasitambang->laboratory()->create([
            'name' => 'Laboratorium Simulasi Komputasi Tambang',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'simulasi-komputasi-tambang',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Mekanika Batuan

        $mekanikabatuan = User::create([
            'name' => 'Admin Laboratorium Mekanika Batuan',
            'email' => 'mekanikabatuan@admin.com',
            'password' => Hash::make('password'),
        ]);

        $mekanikabatuan->assignRole('admin');

        $mekanikabatuan->laboratory()->create([
            'name' => 'Laboratorium Mekanika Batuan',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'mekanika-batuan',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Pengolahan Bahan Galian

        $pengolahanbahangalian = User::create([
            'name' => 'Admin Laboratorium Pengolahan Bahan Galian',
            'email' => 'pengolahanbahangalian@admin.com',
            'password' => Hash::make('password'),
        ]);

        $pengolahanbahangalian->assignRole('admin');

        $pengolahanbahangalian->laboratory()->create([
            'name' => 'Laboratorium Pengolahan Bahan Galian',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'pengolahan-bahan-galian',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Hidrometalurgi

        $hidrometalurgi = User::create([
            'name' => 'Admin Laboratorium Hidrometalurgi',
            'email' => 'hidrometalurgi@admin.com',
            'password' => Hash::make('password'),
        ]);

        $hidrometalurgi->assignRole('admin');

        $hidrometalurgi->laboratory()->create([
            'name' => 'Laboratorium Hidrometalurgi',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'hidrometalurgi',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Pirometalurgi

        $pirometalurgi = User::create([
            'name' => 'Admin Laboratorium Pirometalurgi',
            'email' => 'pirometalurgi@admin.com',
            'password' => Hash::make('password'),
        ]);

        $pirometalurgi->assignRole('admin');

        $pirometalurgi->laboratory()->create([
            'name' => 'Laboratorium Pirometalurgi',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'pirometalurgi',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Korosi

        $korosi = User::create([
            'name' => 'Admin Laboratorium Korosi',
            'email' => 'korosi@admin.com',
            'password' => Hash::make('password'),
        ]);

        $korosi->assignRole('admin');

        $korosi->laboratory()->create([
            'name' => 'Laboratorium Korosi',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'korosi',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);

        // Pengolahan Mineral

        $pengolahanmineral = User::create([
            'name' => 'Admin Laboratorium Pengolahan Mineral',
            'email' => 'pengolahanmineral@admin.com',
            'password' => Hash::make('password'),
        ]);

        $pengolahanmineral->assignRole('admin');

        $pengolahanmineral->laboratory()->create([
            'name' => 'Laboratorium Pengolahan Mineral',
            'banner' => 'dummy/1200x800.jpg',
            'phone' => '+62 812-3456-789',
            'slug' => 'pengolahan-mineral',
            'address' => 'Jl. SWK Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
        ]);
    }
}
