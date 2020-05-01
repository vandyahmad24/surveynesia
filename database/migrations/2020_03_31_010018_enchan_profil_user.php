<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnchanProfilUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profil_mitra', function (Blueprint $table) {
            $table->string('no_rek')->default(0);
            $table->string('status')->default('available');
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
            $table->dropColumn('no_rek');
            $table->dropColumn('status');
        });
    }
}
