<?php

namespace Database\Seeders;

use App\Models\CustomerStatus;
use Illuminate\Database\Seeder;

class CustomerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerStatuses = [
            [
                'name' => 'Mahasiswa Jurusan Teknik Pertambangan UPN',
                'slug' => 'mahasiswa-jurusan-teknik-pertambangan-upn'
            ],
            [
                'name' => 'Mahasiswa UPN',
                'slug' => 'mahasiswa-upn'
            ],
            [
                'name' => 'Mahasiswa Luar UPN',
                'slug' => 'mahasiswa-luar-upn'
            ],
            [
                'name' => 'Proyek (umum) dan Penelitian',
                'slug' => 'proyek-umum-dan-penelitian'
            ],
        ];

        foreach($customerStatuses as $customerStatus){
            CustomerStatus::create($customerStatus);
        }
    }
}
