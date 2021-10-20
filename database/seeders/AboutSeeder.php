<?php

namespace Database\Seeders;

use App\Models\About;
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
        About::create([
            'desc' => '<p>Puji dan syukur kami panjatkan kepada Allah SWT atas terbitnya buku Profil Laboratorium Jurusan Teknik Pertambangan, Fakultas Teknologi Mineral, Universitas Pembangunan Nasional “Veteran” Yogyakarta. Buku ini merupakan ikhtiar Jurusan Teknik Pertambangan untuk meningkatkan tata kelola laboratorium menuju laboratorium yang tersertifikasi sehingga mampu memberikan manfaat yang jauh lebih baik kepada mahasiswa, masyarakat dan dunia industri. Laboratorium-laboratorium di Jurusan Teknik Pertambangan, UPN “Veteran” Yogyakarta merupakan salah satu wadah dalam pengembangan ilmu pengetahuan dan teknologi yang bertujuan untuk:</p><ul><li>Mendukung pembelajaran yang lebih optimal sehingga dapat meningkatkan pemahaman mahasiswa terhadap konsep teoritis dan aplikasi di lapangan.</li><li>Melaksanakan pengabdian kepada masyarakat dengan memberikan pelayanan penelitian dan pengujian bagi institusi sendiri maupun stake holder.</li></ul><p>Diharapkan laboratorium di Jurusan Teknik Pertambangan, UPN “Veteran” Yogyakarta mampu meningkatkan kompetensi akademik mahasiswa, disamping itu juga dapat dimanfaatkan untuk pengabdian kepada masyarakat, kerjasama riset nasional dan internasional sehingga menjadi problem solver bagi masyarakat dan dunia industri.</p>',
            'vision' => 'Menjadi lembaga pendidikan dan riset ilmu pengetahuan / teknologi pertambangan yang berwawasan kebangsaan, berkualitas internasional.',
            'mission' => [
                [
                    'value' => 'Menyelenggarakan pendidikan dan riset dalam bidang rekayasa pertambangan.',
                ],
                [
                    'value' => 'Menyelenggarakan pengabdian dan pengembangan ilmu pengetahuan / teknologi pertambangan.'
                ]
            ]
        ]);
    }
}
