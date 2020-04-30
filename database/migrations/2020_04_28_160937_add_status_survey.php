<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("ALTER TABLE survey MODIFY COLUMN status ENUM('pending','proses','finish','tolak')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          DB::statement("ALTER TABLE survey MODIFY COLUMN status ENUM('pending','proses','finish')");
    }
}
