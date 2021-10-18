<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peralatan = Laboratory::where('slug', 'mekanika-tanah')->first();

        $peralatan->tests()->createMany([
            [
                'title' => 'Uji kuat geser tanah',
                'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita est error corporis. Sit, debitis laudantium similique incidunt beatae commodi. Assumenda, eligendi veniam id tempora ipsum pariatur perspiciatis laboriosam itaque ducimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita est error corporis. Sit, debitis laudantium similique incidunt beatae commodi. Assumenda, eligendi veniam id tempora ipsum pariatur perspiciatis laboriosam itaque ducimus.'
            ],
            [
                'title' => 'Uji bobot isi tanah',
            ],
            [
                'title' => 'Uji kadar air tanah',
            ],
            [
                'title' => 'Uji berat jenis tanah',
            ],
            [
                'title' => 'Uji batas-batas atterberg',
            ],
            [
                'title' => 'Analisis ayakan dan hydrometer',
            ],
            [
                'title' => 'Uji kuat tekan bebas tanah',
            ],
            [
                'title' => 'Uji pemadatan tanah',
            ],
            [
                'title' => 'Uji konsolidasi',
            ],
            [
                'title' => 'Dynamic Cone Penetrometer (DCP)',
            ],
        ]);
    }
}
