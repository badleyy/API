<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RafflesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run() {
      
    DB::table('raffles')->insert([
      'product_id' => 1, // These are hard coded because they will be created when the product is created. They have a 1 to 1 relationship
      'open_date' => Carbon::now(),
      'close_date' => Carbon::now(),
      'raffle_date' => Carbon::now(),
      'ticket_price'  => 5.00,
      'current_num_tickets' => 4,
      'maximum_num_tickets' => 100,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);


    DB::table('raffles')->insert([
      'product_id' => 2, // These are hard coded because they will be created when the product is created. They have a 1 to 1 relationship
      'open_date' => Carbon::now(),
      'close_date' => Carbon::now(),
      'raffle_date' => Carbon::now(),
      'ticket_price'  => 10.00,
      'current_num_tickets' => 30,
      'maximum_num_tickets' => 100,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
  }
}
