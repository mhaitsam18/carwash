<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\Paket;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Aldin Caesario Iswandi',
            'nomor_telepon' => '082215144057',
            'email' => 'aldincaesario@gmail.com',
            'password' => bcrypt('1234'),
            'role_id' => 2,
        ]);

        Kendaraan::create([
            'user_id' => 1,
            'nama' => 'Vios',
            'merk' => 'Toyota',
            'warna' => 'Biru Metalik',
            'plat_nomor' => 'T 1742 MP'
        ]);

        Lokasi::create([
            'nama' => 'Wetlook Jasmin Residence',
            'alamat' => 'Jl. Semanggi no. 48 Jakarta',
            'nomor_telepon' => '082215144057',
            'slot_parkir' => 5
        ]);

        Lokasi::create([
            'nama' => 'Wetlook Lampu Merah Semplak',
            'alamat' => 'Jl. Semplak no. 48 Jakarta',
            'nomor_telepon' => '082215144057',
            'slot_parkir' => 4
        ]);
        Lokasi::create([
            'nama' => 'Wetlook Ciampea Komplek IPB Dermaga',
            'alamat' => 'Jl. Ciampea no. 48 Jakarta',
            'nomor_telepon' => '082215144057',
            'slot_parkir' => 5
        ]);
        Lokasi::create([
            'nama' => 'Wetlook Cimanggu, Jalan Baru',
            'alamat' => 'Jl. Baru, Kec. Cimanggu no. 48 Jakarta',
            'nomor_telepon' => '082215144057',
            'slot_parkir' => 5
        ]);

        Paket::create([
            'nama' => 'Steam Biasa',
            'keterangan' => 'Body Mobil dan Debu dalam mobil',
            'harga' => 40000,
            'lokasi_id' => 1
        ]);

        Paket::create([
            'nama' => 'Steam Istimewa',
            'keterangan' => 'Body Mobil, kap mobil, karpet mobil, bagasi mobil, sela-sela kursi dan Debu dalam mobil,',
            'harga' => 70000,
            'lokasi_id' => 1
        ]);


        Paket::create([
            'nama' => 'Steam Biasa',
            'keterangan' => 'Body Mobil dan Debu dalam mobil',
            'harga' => 40000,
            'lokasi_id' => 2
        ]);

        Paket::create([
            'nama' => 'Steam Istimewa',
            'keterangan' => 'Body Mobil, kap mobil, karpet mobil, bagasi mobil, sela-sela kursi dan Debu dalam mobil,',
            'harga' => 70000,
            'lokasi_id' => 2
        ]);

        Paket::create([
            'nama' => 'Steam Biasa',
            'keterangan' => 'Body Mobil dan Debu dalam mobil',
            'harga' => 50000,
            'lokasi_id' => 3
        ]);

        Paket::create([
            'nama' => 'Steam Istimewa',
            'keterangan' => 'Body Mobil, kap mobil, karpet mobil, bagasi mobil, sela-sela kursi dan Debu dalam mobil,',
            'harga' => 70000,
            'lokasi_id' => 3
        ]);

        Paket::create([
            'nama' => 'Steam Biasa',
            'keterangan' => 'Body Mobil dan Debu dalam mobil',
            'harga' => 40000,
            'lokasi_id' => 4
        ]);

        Paket::create([
            'nama' => 'Steam Istimewa',
            'keterangan' => 'Body Mobil, kap mobil, karpet mobil, bagasi mobil, sela-sela kursi dan Debu dalam mobil,',
            'harga' => 80000,
            'lokasi_id' => 5
        ]);

        Booking::create([
            'kendaraan_id' => 1,
            'paket_id' => 1,
            'tanggal' => date('Y-m-d'),
            'waktu' => '12:00:00'
        ]);
    }
}
