<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        	'first_name' => 'Cory',
        	'last_name' => 'Baker',
        	'email_address' => 'cpb2948@gmail.com',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),

		]);

		DB::table('users')->insert([
        	'first_name' => 'Dan',
        	'last_name' => 'Hadley',
        	'email_address' => 'dadleyy@gmail.com',
			'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);
    }
}
