<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {

    Model::unguard();

    $this->call(UsersTableSeeder::class);
    $this->call(AccountsTableSeeder::class);
    $this->call(FinancesTableSeeder::class);
    $this->call(ProductsTableSeeder::class);
    $this->call(RafflesTableSeeder::class);
    $this->call(TicketsTableSeeder::class);
    $this->call(AccountsRafflesTableSeeder::class);
    $this->call(MediasTableSeeder::class);

    Model::reguard();
  }
}
