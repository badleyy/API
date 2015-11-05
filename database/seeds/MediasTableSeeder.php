<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MediasTableSeeder extends Seeder
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
        $raffleId = DB::table('accounts_raffles')->where('account_id', $accountId)->pluck('raffle_id');
        $productId = DB::table('raffles')->where('raffle_id', $raffleId)->pluck('product_id');
        //
		DB::table('medias')->insert([
			'product_id' => $productId,
        	'media_type' => 'picture',
        	'media_value' => '/var/www/pictures/24',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);

        $accountId = DB::table('accounts')->where('username', 'dadley')->pluck('account_id');
        $raffleId = DB::table('accounts_raffles')->where('account_id', $accountId)->pluck('raffle_id');
        $productId = DB::table('raffles')->where('raffle_id', $raffleId)->pluck('product_id');

		DB::table('medias')->insert([
			'product_id' => $productId,
        	'media_type' => 'picture',
        	'media_value' => '/var/www/pictures/23',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
		]);
    }
}
