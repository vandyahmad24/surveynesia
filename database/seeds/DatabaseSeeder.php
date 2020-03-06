<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(IndoRegionSeeder::class);
        $this->call(JenisSurveySeeder::class);
        $this->call(KonfigurasiSeeder::class);
        $this->call(PerkerjaanSeeder::class);
    }
}
