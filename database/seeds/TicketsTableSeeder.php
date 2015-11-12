<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TicketsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {

    // Very easily could write way better sql here. Just too damn lazy
    $accountId = DB::table('users')->where('username', 'bakeshow')->pluck('user_id');
      
    DB::table('tickets')->insert([
      'user_id' => $accountId,
      'raffle_id' => 1, // There should always be a raffle 1 and 2
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    // Very easily could write way better sql here. Just too damn lazy
    $accountId = DB::table('users')->where('username', 'dadley')->pluck('user_id');

    DB::table('tickets')->insert([
      'user_id' => $accountId,
      'raffle_id' => 2, // There should always be a raffle 1 and 2
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
  }
}
