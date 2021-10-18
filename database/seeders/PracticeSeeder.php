<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perpetaan = Laboratory::where('slug', 'perpetaan')->first();
        $perpetaan->practices()->createMany([
            [
                'title' => 'Pengenalan alat dan poligon tertutup',
                'desc' => 'Adapun maksud dari pengukuran poligon adalah untuk memperoleh kedudukan/posisi/ koordinat/titik-titik di lapangan, sedangkan tujuannya adalah sebagai acuan untuk menempatkan titik-titik detil sebagai fungsi ataupun konfigurasi dari peta yang akan dibuat. Biasanya poligon tertutup digunakan untuk memetakan bangunan dan luas IUP pertambangan.',
            ],
            [
                'title' => 'Poligon terbuka terikat sempurna',
                'desc' => 'Pekerjaan pemetaan diperlukan suatu kerangka dasar peta (poligon) yang merupakan jaringan sejumlah titik yang diketahui posisi koordinatnya dalam sistem tertentu yang berfungsi sebagai pengikat / acuan lokasi untuk menempatkan titik-titik detil, baik detil ketinggian yang mendasarkan bentuk permukaan ataupun detil tata letak unsur alam (sungai, lembah) dan unsur buatan manusia (jalan, bangunan) dimana titik-titik tersebut digambarkan pada lembar peta.'
            ],
            [
                'title' => 'Pemetaan situasi (tranches)',
                'desc' => 'Peta situasi merupakan gambaran sebagian dari permukaan bumi yang memuat informasi mengenai unsur-unsur alam (pegunungan, lembah, danau, sungai dan lainnya) dan unsur-unsur buatan manusia (gedung, jalan raya, saluran irigasi dan lainnya), yang digambarkan dengan simbol-simbol tertentu pada bidang datar dengan skala tertentu.'
            ],
            [
                'title' => 'Pengolahan data menggunakan software AutoCAD',
                'desc' => 'AutoCAD merupakan perangkat lunak untuk menggambar 2D maupun 3D yang dikembangkan oleh Autodesk. Pemetaan situasi dapat dibuat dengan autoCAD karena aplikasi ini sangat mendasar dalam pemetaan.'
            ],
            [
                'title' => 'Pengolahan data menggunakan software ArcGIS',
                'desc' => 'ArcGIS adalah salah satu software yang di kembangkan oleh ESRI (Environment Sience & Reaserch Institute) memiliki kemampuan untuk membangun, menyimpan, mengelola dan menampilkan informasi berefrensi geografis, misalnya data yang diidentifikasi menurut lokasinya, dalam sebuah database.'
            ],
            [
                'title' => 'Pengenalan SRTM (Shuttle Radar Topography Mission)',
                'desc' => 'Shuttle Radar Topography Mission atau yang biasa disebut SRTM adalah suatu project pemetaan topografi menggunakan radar yang menghasilkan data Digital Elevation Model (DEM SRTM) yang hampir mencangkup seluruh permukaan bumi.'
            ],
            [
                'title' => 'Pengenalan peta bathimetri',
                'desc' => 'Acara VII mempelajari kedalaman di bawah air dan studi tentang tiga dimensi lantai samudra atau danau. Sebuah peta batimetri umumnya menampilkan relief lantai atau dataran dengan garis-garis kontur (contour lines) yang disebut kontur kedalaman (depth contours atau isobath), dan dapat memiliki informasi tambahan berupa informasi navigasi permukaan.'
            ],
            [
                'title' => 'Total Station: stake out.',
                'desc' => 'Stake out adalah metode yang menggunakan cara pendekatan model pengukuran dengan menentukan lokasi koordinat suatu titik dilapangan.'
            ],
        ]);
    }
}
