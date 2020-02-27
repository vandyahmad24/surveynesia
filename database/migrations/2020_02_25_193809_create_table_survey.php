<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('jenis_id')->nullable()->unsigned();;
            $table->foreign('jenis_id')->references('id')->on('jenis_survey')->onDelete('restrict');
            // for survey request
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->unsignedBigInteger('surveyor_id')->nullable()->unsigned();;
            $table->foreign('surveyor_id')->references('id')->on('users')->onDelete('restrict');

            $table->date('tgl_selesai');
            $table->string('lokasi');
            $table->string('upload')->nullable();
            $table->string('deskripsi_survey');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
