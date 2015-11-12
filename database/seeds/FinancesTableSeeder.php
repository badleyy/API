<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FinancesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {

    $accountId = DB::table('users')->where('username', 'bakeshow')->pluck('user_id');
    
    DB::table('finances')->insert([
      'user_id' => $accountId,
      'finance_type' => 'paypal',
      'balance' => 50.00,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),

    ]);

    $accountId = DB::table('users')->where('username', 'dadley')->pluck('user_id');

    DB::table('finances')->insert([
      'user_id' => $accountId,
      'finance_type' => 'paypal',
      'balance' => 50.00,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
  }
}
