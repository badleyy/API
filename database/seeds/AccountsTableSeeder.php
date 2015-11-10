<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccountsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {

    $userId = DB::table('users')->where('first_name', 'Cory')->pluck('user_id');
    	
		DB::table('accounts')->insert([
			'user_id' => $userId,
      'username' => 'bakeshow',
      'password' => Hash::make('bakeshow'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),

		]);

		$userId = DB::table('users')->where('first_name', 'Dan')->pluck('user_id');

		DB::table('accounts')->insert([
			'user_id' => $userId,
      'username' => 'dadley',
      'password' => Hash::make('dadley'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
		]);
  }
}
