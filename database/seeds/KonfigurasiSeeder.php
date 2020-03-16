<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Harga Dasar Survey',
        	'kategori' => 'primary',
        	'harga' => 8000,
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => '2 minggu',
        	'kategori' => 'jangka_waktu',
        	'harga' => 50,
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => '3 minggu',
        	'kategori' => 'jangka_waktu',
        	'harga' => 25,
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => '4 minggu',
        	'kategori' => 'jangka_waktu',
        	'harga' => 0,
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Masyarakat Umum',
        	'kategori' => 'kategori',
        	'harga' => 25,
        	'created_at' => Carbon::now()
        ]);
         DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Pejabat',
        	'kategori' => 'kategori',
        	'harga' => 250,
        	'created_at' => Carbon::now()
        ]);
          DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Nasabah',
        	'kategori' => 'kategori',
        	'harga' => 50,
        	'created_at' => Carbon::now()
        ]);
           DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Pengusaha (Pemilik Bisnis)',
        	'kategori' => 'kategori',
        	'harga' => 150,
        	'created_at' => Carbon::now()
        ]);
           DB::table('konfigurasi')->insert([
        	'deskripsi' => 'UMKM',
        	'kategori' => 'kategori',
        	'harga' => 75,
        	'created_at' => Carbon::now()
        ]);
           DB::table('konfigurasi')->insert([
            'deskripsi' => 'Pelajar/Mahasiswa',
            'kategori' => 'kategori',
            'harga' => 0,
            'created_at' => Carbon::now()
        ]);
    }
}
