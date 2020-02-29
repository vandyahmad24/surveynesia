<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PerkerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Karyawan',
        	'kategori' => 'perkerjaan',
        	'harga' => '0',
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Pelajar',
        	'kategori' => 'perkerjaan',
        	'harga' => '0',
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Guru',
        	'kategori' => 'perkerjaan',
        	'harga' => '0',
        	'created_at' => Carbon::now()
        ]);
        DB::table('konfigurasi')->insert([
        	'deskripsi' => 'Pengusaha',
        	'kategori' => 'perkerjaan',
        	'harga' => '0',
        	'created_at' => Carbon::now()
        ]);
    }
}
