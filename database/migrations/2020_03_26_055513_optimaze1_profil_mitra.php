<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Optimaze1ProfilMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('profil_mitra', function (Blueprint $table) {
            $table->dropcolumn('nama');
            $table->string('jumlah_anggota');
            $table->string('provinsi');
            $table->string('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('profil_mitra', function (Blueprint $table) {
            $table->string('nama');
            $table->dropcolumn('jumlah_anggota');
            $table->dropcolumn('provinsi');
            $table->dropcolumn('kabupaten');
        });
    }
}
