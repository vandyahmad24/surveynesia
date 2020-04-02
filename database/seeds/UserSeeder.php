
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin Surveynesia',
        	'email' => 'vandyahmad2404@gmail.com',
        	'password' => Hash::make('12341234'),
        	'level' => 'admin',
            'is_active' => 1,
        	'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
        	'name' => 'Mitra Surveynesia',
        	'email' => 'mitra@gmail.com',
        	'password' => Hash::make('12341234'),
        	'level' => 'mitra',
            'is_active' => 0,
        	'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
        	'name' => 'User 1 Surveynesia',
        	'email' => 'user@gmail.com',
        	'password' => Hash::make('12341234'),
        	'level' => 'user',
            'is_active' => 0,
        	'created_at' => Carbon::now()
        ]);
         DB::table('users')->insert([
            'name' => 'User 1 Surveynesia',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12341234'),
            'level' => 'operasional',
            'is_active' => 1,
            'created_at' => Carbon::now()
        ]);
        
    }
}
