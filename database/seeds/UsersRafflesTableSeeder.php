<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersRafflesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
  	// Very easily could write way better sql here. Just too damn lazy
  	$accountId = DB::table('users')->where('username', 'bakeshow')->pluck('user_id');
    	
		DB::table('users_raffles')->insert([
			'user_id' => $accountId,
			'raffle_id' => 1, // Should always be a 1 and 2 for seeding
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);

		$accountId = DB::table('users')->where('username', 'dadley')->pluck('user_id');

		DB::table('users_raffles')->insert([
			'user_id' => $accountId,
			'raffle_id' => 2, // Should always be a 1 and 2 for seeding
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);
  }
}
