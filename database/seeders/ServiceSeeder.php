<?php

namespace Database\Seeders;

use App\Models\CustomerStatus;
use App\Models\Laboratory;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perHari = Unit::where('slug', 'per-hari')->first()->id;
        $perSampel = Unit::where('slug', 'per-sampel')->first()->id;
        $perLine = Unit::where('slug', 'per-line')->first()->id;
        $perTitik = Unit::where('slug', 'per-titik')->first()->id;
        $paketA = Unit::where('slug', 'paket-a')->first()->id;
        $paketB = Unit::where('slug', 'paket-b')->first()->id;

        $mekanikaTanahDatas = [
            [
                'name' => 'Uji Sifat Fisik Kadar Air',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-kadar-air',
                // 'price_1' => '10000',
                // 'price_2' => '25000',
                // 'price_3' => '37500',
                // 'price_4' => '50000',
            ],
            [
                'name' => 'Uji Sifat Fisik Berat Jenis',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-berat-jenis',
                // 'price_1' => '10000',
                // 'price_2' => '25000',
                // 'price_3' => '37500',
                // 'price_4' => '50000',
            ],
            [
                'name' => 'Uji Sifat Fisik Bobot Isi',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-bobot-isi',
                // 'price_1' => '9000',
                // 'price_2' => '22500',
                // 'price_3' => '33750',
                // 'price_4' => '45000',
            ],
            [
                'name' => 'Uji Sifat Fisik Analisis Ayakan',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-analisis-ayakan',
                // 'price_1' => '14000',
                // 'price_2' => '35500',
                // 'price_3' => '52500',
                // 'price_4' => '70000',
            ],
            [
                'name' => 'Uji Sifat Fisik Hidrometer',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-hidrometer',
                // 'price_1' => '28000',
                // 'price_2' => '70000',
                // 'price_3' => '105000',
                // 'price_4' => '140000',
            ],
            [
                'name' => 'Uji Sifat Fisik Batas Atterberg',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-fisik-batas-atterberg',
                // 'price_1' => '16000',
                // 'price_2' => '40000',
                // 'price_3' => '60000',
                // 'price_4' => '80000',
            ],
            [
                'name' => 'Uji Sifat Mekanik Kuat Geser',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-mekanik-kuat-geser',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
            [
                'name' => 'Uji Sifat Mekanik Kuat Tekan',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-mekanik-kuat-tekan',
                // 'price_1' => '16000',
                // 'price_2' => '40000',
                // 'price_3' => '60000',
                // 'price_4' => '80000',
            ],
            [
                'name' => 'Uji Sifat Mekanik Konsolidasi',
                'unit_id' => $perSampel,
                'slug' => 'uji-sifat-mekanik-konsolidasi',
                // 'price_1' => '60000',
                // 'price_2' => '150000',
                // 'price_3' => '225000',
                // 'price_4' => '300000',
            ],
            [
                'name' => 'Pemadatan Tanah',
                'unit_id' => $perSampel,
                'slug' => 'pemadatan-tanah',
                // 'price_1' => '40000',
                // 'price_2' => '100000',
                // 'price_3' => '150000',
                // 'price_4' => '200000',
            ],
            [
                'name' => 'Uji Lapangan Dynamic Cone Penetrometer',
                'unit_id' => $perTitik,
                'note' => 'Minimal 20 titik',
                'slug' => 'uji-lapangan-dynamic-cone-penetrometer',
                // 'price_1' => '30000',
                // 'price_2' => '75000',
                // 'price_3' => '112500',
                // 'price_4' => '150000',
                'min' => '20',
            ],
            [
                'name' => 'Pengambilan Sampel',
                'unit_id' => $perSampel,
                'slug' => 'pengambilan-sampel',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
            [
                'name' => 'Preparasi',
                'unit_id' => $perSampel,
                'slug' => 'preparasi',
                // 'price_1' => '12000',
                // 'price_2' => '30000',
                // 'price_3' => '45000',
                // 'price_4' => '60000',
            ],
        ];

        $mekanikaTanah = Laboratory::where('slug', 'mekanika-tanah')->first();
        foreach($mekanikaTanahDatas as $mekanikaTanahData){
            $mekanikaTanah->services()->create($mekanikaTanahData);
        }

        $mekanikaBatuanDatas = [
            [
                'name' => 'Uji Sifat Fisik',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-sifat-fisik',
                // 'price_1' => '45000',
                // 'price_2' => '112500',
                // 'price_3' => '168750',
                // 'price_4' => '225000',
            ],
            [
                'name' => 'Uji Kuat Tekan Uniaksial',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-kuat-tekan-uniaksial',
                // 'price_1' => '45000',
                // 'price_2' => '112500',
                // 'price_3' => '168750',
                // 'price_4' => '225000',
            ],
            [
                'name' => 'Uji Kuat Tarik Tidak Langsung',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-kuat-tarik-tidak-langsung',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
            [
                'name' => 'Uji Geser Langsung',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-geser-langsung',
                // 'price_1' => '90000',
                // 'price_2' => '225000',
                // 'price_3' => '337500',
                // 'price_4' => '450000',
            ],
            [
                'name' => 'Uji Triaksial',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-triaksial',
                // 'price_1' => '90000',
                // 'price_2' => '225000',
                // 'price_3' => '337500',
                // 'price_4' => '450000',
            ],
            [
                'name' => 'Uji Beban Titik',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-beban-titik',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
            [
                'name' => 'Uji Keausan Agregat',
                'unit_id' => $perSampel,
                'note' => 'Ukuran -2 cm sebanyak 10 kg',
                'slug' => 'uji-keausan-agregat',
                // 'price_1' => '90000',
                // 'price_2' => '225000',
                // 'price_3' => '337500',
                // 'price_4' => '450000',
            ],
            [
                'name' => 'Uji Baji',
                'unit_id' => $perSampel,
                'note' => 'Sampel yang masuk berupa core (inti bor) dengen dimensi yang sesuai',
                'slug' => 'uji-baji',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
        ];

        $mekanikaBatuan = Laboratory::where('slug', 'mekanika-batuan')->first();
        foreach($mekanikaBatuanDatas as $mekanikaBatuanData){
            $mekanikaBatuan->services()->create($mekanikaBatuanData);
        }

        $ukurTambangDatas = [
            [
                'name' => 'Peminjaman Satu Set Alat Theodolite Topcon Manual',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-theodolite-topcon-manual',
                // 'price_1' => '30000',
                // 'price_2' => '75000',
                // 'price_3' => '112500',
                // 'price_4' => '150000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Digital Theodolite Sokkia DT 600',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-digital-theodolite-sokkia-dt-600',
                // 'price_1' => '40000',
                // 'price_2' => '100000',
                // 'price_3' => '150000',
                // 'price_4' => '200000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Digital Theodolit Nikon 101',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-digital-theodolit-nikon-101',
                // 'price_1' => '40000',
                // 'price_2' => '100000',
                // 'price_3' => '150000',
                // 'price_4' => '200000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Total Station Leica',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-total-station-leica',
                // 'price_1' => '70000',
                // 'price_2' => '175000',
                // 'price_3' => '262500',
                // 'price_4' => '350000',
            ],
        ];

        $batubaraDatas = [
            [
                'name' => 'Preparasi Sampel (hingga 60 mesh)',
                'unit_id' => $perSampel,
                'note' => 'Minimal Sampel 3 Kg, untuk sampel biomassa dilakukan sesuai metode batubara dengan syarat: a) kondisi sampel bisa dihancurkan dan dihaluskan, dan b) sampel tidak dalam keadaan basah',
                'slug' => 'preparasai-sampel-hingga-60-mesh',
                // 'price_1' => '40000',
                // 'price_2' => '100000',
                // 'price_3' => '150000',
                // 'price_4' => '200000',
            ],
            [
                'name' => 'Analisis Nilai Kalor',
                'unit_id' => $perSampel,
                'note' => 'Minimal Sampel 100 gram (lolos mesh 60), termasuk koreksi total sulfur',
                'slug' => 'analisis-nilai-kalor',
                // 'price_1' => '190000',
                // 'price_2' => '475000',
                // 'price_3' => '712500',
                // 'price_4' => '950000',
            ],
            [
                'name' => 'Analisis CHN',
                'unit_id' => $perSampel,
                'note' => 'Minimal  Sampel 50 gram (lolos mesh 60)',
                'slug' => 'analisis-chn',
                // 'price_1' => '130000',
                // 'price_2' => '325000',
                // 'price_3' => '487500',
                // 'price_4' => '650000',
            ],
            [
                'name' => 'Analisis Total Sulfur',
                'unit_id' => $perSampel,
                'note' => 'Minimal Sampel 50 gram (lolos mesh 60)',
                'slug' => 'analisis-total-sulfur',
                // 'price_1' => '85000',
                // 'price_2' => '212500',
                // 'price_3' => '318750',
                // 'price_4' => '425000',
            ],
            [
                'name' => 'Analisis Proksimat',
                'unit_id' => $perSampel,
                'note' => 'Minimal Sampel 50 gram (lolos mesh 60), analisis proksimat termasuk moisture, abu & volatile',
                'slug' => 'analisis-proksimat',
                // 'price_1' => '110000',
                // 'price_2' => '275000',
                // 'price_3' => '412500',
                // 'price_4' => '550000',
            ],
            [
                'name' => 'Moisture Content Biomassa/ Particulate Wood Fuel',
                'unit_id' => $perSampel,
                'note' => 'Minimal  Sampel 50 gram (max 1 inch³)',
                'slug' => 'moisture-content-biomassa-praticulate-wood-fuel',
                // 'price_1' => '45000',
                // 'price_2' => '112500',
                // 'price_3' => '168750',
                // 'price_4' => '225000',
            ],
            [
                'name' => 'Total Moisture Batubara',
                'unit_id' => $perSampel,
                'note' => 'Minimal Sampel 3 Kg',
                'slug' => 'total-moisture-batubara',
                // 'price_1' => '50000',
                // 'price_2' => '125000',
                // 'price_3' => '187500',
                // 'price_4' => '250000',
            ],
            [
                'name' => 'Ash Content',
                'unit_id' => $perSampel,
                'note' => 'Minimal  Sampel 50 gram (lolos mesh 60)',
                'slug' => 'ash-content',
                // 'price_1' => '45000',
                // 'price_2' => '112500',
                // 'price_3' => '168750',
                // 'price_4' => '225000',
            ],
            [
                'name' => 'Moisture Content',
                'unit_id' => $perSampel,
                'note' => 'Minimal  Sampel 50 gram (lolos mesh 60)',
                'slug' => 'moisture-content',
                // 'price_1' => '40000',
                // 'price_2' => '100000',
                // 'price_3' => '150000',
                // 'price_4' => '200000',
            ],
            [
                'name' => 'Volatile Matter',
                'unit_id' => $perSampel,
                'note' => 'Minimal  Sampel 50 gram (lolos mesh 60)',
                'slug' => 'volatile-matter',
                // 'price_1' => '45000',
                // 'price_2' => '112500',
                // 'price_3' => '168750',
                // 'price_4' => '225000',
            ],
        ];

        $batubara = Laboratory::where('slug', 'batubara')->first();
        foreach($batubaraDatas as $batubaraData){
            $batubara->services()->create($batubaraData);
        }

        $geofisikaDatas = [
            [
                'name' => 'Peminjaman Satu Set Alat GPS',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-gps',
                // 'price_1' => '6000',
                // 'price_2' => '15000',
                // 'price_3' => '22500',
                // 'price_4' => '30000',
            ],
            [
                'name' => 'Peminjaman Satu Set Depthmeter',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-depthmeter',
                // 'price_1' => '15000',
                // 'price_2' => '37500',
                // 'price_3' => '56250',
                // 'price_4' => '75000',
            ],
            [
                'name' => 'Peminjaman Satu Set Echosounder',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-echosounder',
                // 'price_1' => '50000',
                // 'price_2' => '125000',
                // 'price_3' => '187500',
                // 'price_4' => '250000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Nunsenbotle',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-nunsenbotle',
                // 'price_1' => '3000',
                // 'price_2' => '7500',
                // 'price_3' => '11250',
                // 'price_4' => '15000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Suseptibiltymeter',
                'unit_id' => $perSampel,
                'slug' => 'peminjaman-satu-set-alat-suseptibiltymeter',
                // 'price_1' => '500',
                // 'price_2' => '1250',
                // 'price_3' => '1875',
                // 'price_4' => '2500',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Geolistrik Sounding',
                'unit_id' => $perLine,
                'note' => 'Harga belum termasuk teknisi/laboran yang ikut',
                'slug' => 'peminjaman-satu-set-alat-geolistrik-sounding',
                // 'price_1' => '250000',
                // 'price_2' => '625000',
                // 'price_3' => '937500',
                // 'price_4' => '1250000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Geolistrik Wenner',
                'unit_id' => $perLine,
                'note' => 'Harga belum termasuk teknisi/laboran yang ikut',
                'slug' => 'peminjaman-satu-set-alat-geolistrik-wenner',
                // 'price_1' => '500000',
                // 'price_2' => '1250000',
                // 'price_3' => '1875000',
                // 'price_4' => '2500000',
            ],
            [
                'name' => 'Peminjaman Satu Set Geoscanner Supertring',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-geoscanner-supertring',
                // 'price_1' => '1000000',
                // 'price_2' => '2500000',
                // 'price_3' => '3750000',
                // 'price_4' => '5000000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Geomagnet',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-geomagnet',
                // 'price_1' => '1000000',
                // 'price_2' => '2500000',
                // 'price_3' => '3750000',
                // 'price_4' => '5000000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Seismik 12 Chanel',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-seismik-12-chanel',
                // 'price_1' => '600000',
                // 'price_2' => '1500000',
                // 'price_3' => '2250000',
                // 'price_4' => '3000000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Seismik PASI 24CHx2 ',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-seismik-pasi-24chx2',
                // 'price_1' => '1000000',
                // 'price_2' => '2500000',
                // 'price_3' => '3750000',
                // 'price_4' => '5000000',
            ],
        ];

        $geofisikaTambang = Laboratory::where('slug', 'geofisika-tambang')->first();
        foreach($geofisikaDatas as $geofisikaData){
            $geofisikaTambang->services()->create($geofisikaData);
        }

        $ventilasiTambangDatas = [
            [
                'name' => 'Peminjaman Satu Set Alat Sling Psychrometer',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-sling-psychrometer',
                // 'price_1' => '5000',
                // 'price_2' => '12500',
                // 'price_3' => '18750',
                // 'price_4' => '25000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Flow Meter',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-flow-meter',
                // 'price_1' => '20000',
                // 'price_2' => '50000',
                // 'price_3' => '75000',
                // 'price_4' => '100000',
            ],
            [
                'name' => 'Peminjaman Satu Set Alat Anemo Meter ',
                'unit_id' => $perHari,
                'slug' => 'peminjaman-satu-set-alat-anemo-meter',
                // 'price_1' => '5000',
                // 'price_2' => '12500',
                // 'price_3' => '18750',
                // 'price_4' => '25000',
            ],
        ];

        $ventilasiTambang = Laboratory::where('slug', 'ventilasi-tambang')->first();
        foreach($ventilasiTambangDatas as $ventilasiTambangData){
            $ventilasiTambang->services()->create($ventilasiTambangData);
        }

        $simulasiKomputasiAmbangDanMicromineDatas = [
            [
                'name' => 'Pelatihan Micromine',
                'unit_id' => $paketA,
                'note' => 'Pelatihan dilaksanakan selama 3 hari',
                'slug' => 'pelatihan-micromine',
                // 'price_1' => '1300000',
                // 'price_2' => '1300000',
                // 'price_3' => '1800000',
                // 'price_4' => '2500000',
            ],
            // [
                // 'name' => 'Reserve Estimation Concept',
                // 'price_1' => '',
                // 'price_2' => '',
                // 'price_3' => '',
                // 'price_4' => '',
            // ],
            [
                'name' => 'Block Modeling Concept for Mining',
                'unit_id' => $paketB,
                'note' => 'Pelatihan dilaksanakan selama 2 hari',
                'slug' => 'block-modeling-concept-for-mining',
                // 'price_1' => '1000000',
                // 'price_2' => '1000000',
                // 'price_3' => '1500000',
                // 'price_4' => '2000000',
            ],
            // [
                // 'name' => 'Mine Design',
                // 'note' => 'Termasuk makan siang, snack dan minum',
                // 'price_1' => '',
                // 'price_2' => '',
                // 'price_3' => '',
                // 'price_4' => '',
            // ],
            // [
                // 'name' => 'Waste Design',
                // 'price_1' => '',
                // 'price_2' => '',
                // 'price_3' => '',
                // 'price_4' => '',
            // ],
            // [
                // 'name' => 'Road Design',
                // 'price_1' => '',
                // 'price_2' => '',
                // 'price_3' => '',
                // 'price_4' => '',
            // ],
            // [
                // 'name' => 'Mine Report Concept',
                // 'price_1' => '',
                // 'price_2' => '',
                // 'price_3' => '',
                // 'price_4' => '',
            // ],
        ];

        $simulasiKomputasiTambang = Laboratory::where('slug', 'simulasi-komputasi-tambang')->first();
        foreach($simulasiKomputasiAmbangDanMicromineDatas as $simulasiKomputasiAmbangDanMicromineData){
            $simulasiKomputasiTambang->services()->create($simulasiKomputasiAmbangDanMicromineData);
        }
    }
}