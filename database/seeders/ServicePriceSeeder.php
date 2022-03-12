<?php

namespace Database\Seeders;

use App\Models\CustomerStatus;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerStatus1 = CustomerStatus::where('slug', 'mahasiswa-jurusan-teknik-pertambangan-upn')->first()->id;
        $customerStatus2 = CustomerStatus::where('slug', 'mahasiswa-upn')->first()->id;
        $customerStatus3 = CustomerStatus::where('slug', 'mahasiswa-luar-upn')->first()->id;
        $customerStatus4 = CustomerStatus::where('slug', 'proyek-umum-dan-penelitian')->first()->id;

        Service::where('slug', 'uji-sifat-fisik-kadar-air')->first()->servicePrices()->createMany([
            [
                'price' => '10000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '25000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '37500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik-berat-jenis')->first()->servicePrices()->createMany([
            [
                'price' => '10000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '25000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '37500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik-bobot-isi')->first()->servicePrices()->createMany([
            [
                'price' => '9000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '22500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '33750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik-analisis-ayakan')->first()->servicePrices()->createMany([
            [
                'price' => '14000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '35500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '52500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '70000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik-hidrometer')->first()->servicePrices()->createMany([
            [
                'price' => '28000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '70000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '105000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '140000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik-batas-atterberg')->first()->servicePrices()->createMany([
            [
                'price' => '16000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '40000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '60000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '80000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-mekanik-kuat-geser')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-mekanik-kuat-tekan')->first()->servicePrices()->createMany([
            [
                'price' => '16000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '40000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '60000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '80000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-mekanik-konsolidasi')->first()->servicePrices()->createMany([
            [
                'price' => '60000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '150000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '300000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'pemadatan-tanah')->first()->servicePrices()->createMany([
            [
                'price' => '40000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '150000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '200000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-lapangan-dynamic-cone-penetrometer')->first()->servicePrices()->createMany([
            [
                'price' => '30000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '150000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'pengambilan-sampel')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'preparasi')->first()->servicePrices()->createMany([
            [
                'price' => '12000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '30000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '60000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-sifat-fisik')->first()->servicePrices()->createMany([
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '168750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-kuat-tekan-uniaksial')->first()->servicePrices()->createMany([
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '168750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-kuat-tarik-tidak-langsung')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-geser-langsung')->first()->servicePrices()->createMany([
            [
                'price' => '90000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '337500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '450000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-triaksial')->first()->servicePrices()->createMany([
            [
                'price' => '90000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '337500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '450000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'uji-beban-titik')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'uji-keausan-agregat')->first()->servicePrices()->createMany([
            [
                'price' => '90000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '337500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '450000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'uji-baji')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        // Service::where('slug', 'peminjaman-satu-set-alat-theodolite-topcon-manual')->first()->servicePrices()->createMany([
        //     [
        //         'price' => '30000',
        //         'customer_status_id' => $customerStatus1,
        //     ],
        //     [
        //         'price' => '75000',
        //         'customer_status_id' => $customerStatus2,
        //     ],
        //     [
        //         'price' => '112500',
        //         'customer_status_id' => $customerStatus3,
        //     ],
        //     [
        //         'price' => '150000',
        //         'customer_status_id' => $customerStatus4,
        //     ],
        // ]);
        
        // Service::where('slug', 'peminjaman-satu-set-alat-digital-theodolite-sokkia-dt-600')->first()->servicePrices()->createMany([
        //     [
        //         'price' => '40000',
        //         'customer_status_id' => $customerStatus1,
        //     ],
        //     [
        //         'price' => '100000',
        //         'customer_status_id' => $customerStatus2,
        //     ],
        //     [
        //         'price' => '150000',
        //         'customer_status_id' => $customerStatus3,
        //     ],
        //     [
        //         'price' => '200000',
        //         'customer_status_id' => $customerStatus4,
        //     ],
        // ]);
        
        // Service::where('slug', 'peminjaman-satu-set-alat-digital-theodolit-nikon-101')->first()->servicePrices()->createMany([
        //     [
        //         'price' => '40000',
        //         'customer_status_id' => $customerStatus1,
        //     ],
        //     [
        //         'price' => '100000',
        //         'customer_status_id' => $customerStatus2,
        //     ],
        //     [
        //         'price' => '150000',
        //         'customer_status_id' => $customerStatus3,
        //     ],
        //     [
        //         'price' => '200000',
        //         'customer_status_id' => $customerStatus4,
        //     ],
        // ]);

        // Service::where('slug', 'peminjaman-satu-set-alat-total-station-leica')->first()->servicePrices()->createMany([
        //     [
        //         'price' => '70000',
        //         'customer_status_id' => $customerStatus1,
        //     ],
        //     [
        //         'price' => '175000',
        //         'customer_status_id' => $customerStatus2,
        //     ],
        //     [
        //         'price' => '262500',
        //         'customer_status_id' => $customerStatus3,
        //     ],
        //     [
        //         'price' => '350000',
        //         'customer_status_id' => $customerStatus4,
        //     ],
        // ]);
        
        Service::where('slug', 'preparasai-sampel-hingga-60-mesh')->first()->servicePrices()->createMany([
            [
                'price' => '40000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '150000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '200000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'analisis-nilai-kalor')->first()->servicePrices()->createMany([
            [
                'price' => '190000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '475000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '712500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '950000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'analisis-chn')->first()->servicePrices()->createMany([
            [
                'price' => '130000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '325000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '487500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '650000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'analisis-total-sulfur')->first()->servicePrices()->createMany([
            [
                'price' => '85000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '212500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '318750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '425000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'analisis-proksimat')->first()->servicePrices()->createMany([
            [
                'price' => '110000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '275000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '412500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '550000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'moisture-content-biomassa-praticulate-wood-fuel')->first()->servicePrices()->createMany([
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '168750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'total-moisture-batubara')->first()->servicePrices()->createMany([
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '125000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '187500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '250000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'ash-content')->first()->servicePrices()->createMany([
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '168750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'moisture-content')->first()->servicePrices()->createMany([
            [
                'price' => '40000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '150000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '200000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);

        Service::where('slug', 'volatile-matter')->first()->servicePrices()->createMany([
            [
                'price' => '45000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '112500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '168750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '225000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-gps')->first()->servicePrices()->createMany([
            [
                'price' => '6000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '15000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '22500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '30000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-depthmeter')->first()->servicePrices()->createMany([
            [
                'price' => '15000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '37500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '56250',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-echosounder')->first()->servicePrices()->createMany([
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '125000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '187500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '250000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-nunsenbotle')->first()->servicePrices()->createMany([
            [
                'price' => '3000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '7500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '11250',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '15000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-suseptibiltymeter')->first()->servicePrices()->createMany([
            [
                'price' => '500',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '1250',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '1875',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '2500',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-geolistrik-sounding')->first()->servicePrices()->createMany([
            [
                'price' => '250000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '625000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '937500',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '1250000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-geolistrik-wenner')->first()->servicePrices()->createMany([
            [
                'price' => '500000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '1250000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '1875000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '2500000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-geoscanner-supertring')->first()->servicePrices()->createMany([
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '2500000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '3750000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '5000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-geomagnet')->first()->servicePrices()->createMany([
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '2500000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '3750000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '5000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-seismik-12-chanel')->first()->servicePrices()->createMany([
            [
                'price' => '600000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '1500000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '2250000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '3000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-seismik-pasi-24chx2')->first()->servicePrices()->createMany([
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '2500000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '3750000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '5000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-sling-psychrometer')->first()->servicePrices()->createMany([
            [
                'price' => '5000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '12500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '18750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '25000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-flow-meter')->first()->servicePrices()->createMany([
            [
                'price' => '20000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '50000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '75000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '100000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'peminjaman-satu-set-alat-anemo-meter')->first()->servicePrices()->createMany([
            [
                'price' => '5000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '12500',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '18750',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '25000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'pelatihan-micromine')->first()->servicePrices()->createMany([
            [
                'price' => '1300000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '1300000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '1800000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '2500000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
        
        Service::where('slug', 'block-modeling-concept-for-mining')->first()->servicePrices()->createMany([
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus1,
            ],
            [
                'price' => '1000000',
                'customer_status_id' => $customerStatus2,
            ],
            [
                'price' => '1500000',
                'customer_status_id' => $customerStatus3,
            ],
            [
                'price' => '2000000',
                'customer_status_id' => $customerStatus4,
            ],
        ]);
    }
}
