<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class JenisSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_survey')->insert([
        	'nama_survey' => 'Survey Data',
        	'deskripsi' => 'Memberikan Pelayanan Berupa data online yang di bagikan melalui google form',
        	'icon' => 'fab fa-google-drive',
        	'created_at' => Carbon::now(),
            'is_active' => 1
        ]);

         DB::table('jenis_survey')->insert([
        	'nama_survey' => 'Survey Lokasi',
        	'deskripsi' => 'Memberikan Pelayanan Berupa Survey Ke sejumlah lokasi yang anda inginkan',
        	'icon' => 'fas fa-car',
        	'created_at' => Carbon::now(),
            'is_active' => 1
        ]);
         
    }
}
