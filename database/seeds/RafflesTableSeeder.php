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
    public function run()
    {

    	// Very easily could write way better sql here. Just too damn lazy
    	$accountId = DB::table('accounts')->where('username', 'bakeshow')->pluck('account_id');
    	$productId = DB::table('products')->where('account_id', $accountId)->pluck('product_id');
    	
        //
		DB::table('raffles')->insert([
			'product_id' => $productId,
        	'open_date' => Carbon::now(),
        	'close_date' => Carbon::now(),
        	'raffle_date' => Carbon::now(),
        	'ticket_price'  => 5.00,
        	'current_num_tickets' => 4,
        	'maximum_num_tickets' => 100,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),

		]);

		// Very easily could write way better sql here. Just too damn lazy
    	$accountId = DB::table('accounts')->where('username', 'dadley')->pluck('account_id');
    	$productId = DB::table('products')->where('account_id', $accountId)->pluck('product_id');

		DB::table('raffles')->insert([
			'product_id' => $productId,
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
