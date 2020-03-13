<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersIsActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
           $table->boolean('is_active');
           $table->string('otp',4)->nullable();
           $table->string('foto')->nullable();
        });
        Schema::table('profil_user', function (Blueprint $table) {
           $table->dropColumn('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('is_active');
           $table->dropColumn('otp');
           $table->dropColumn('foto');
        });
          Schema::table('profil_user', function (Blueprint $table) {
           $table->string('foto')->nullable();
        });
    }
}
