<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',100);
            $table->string('alamat',255);
            $table->string('no_identitas',255);
            $table->string('perkerjaan')->nullable();
            $table->string('no_hp',255);
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('profil_user');
    }
}
