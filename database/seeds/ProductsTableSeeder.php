<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$accountId = DB::table('accounts')->where('username', 'bakeshow')->pluck('account_id');
    	
        //
		DB::table('products')->insert([
			//'account_id' => $accountId,
        	'product_name' => 'New Headphones',
        	'product_description' => 'Brand new headphones',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);

		$accountId = DB::table('accounts')->where('username', 'dadley')->pluck('account_id');

		DB::table('products')->insert([
			//'account_id' => $accountId,
        	'product_name' => 'New TV',
        	'product_description' => 'Brand new tv',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);
    }
}
