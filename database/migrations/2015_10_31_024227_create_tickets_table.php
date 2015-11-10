<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    //
    Schema::create('tickets', function(Blueprint $table){
      $table->increments('ticket_id');
      $table->integer('account_id')->unsigned();
      $table->foreign('account_id')->references('account_id')->on('accounts');
      $table->integer('raffle_id')->unsigned();
      $table->foreign('raffle_id')->references('raffle_id')->on('raffles');
      $table->boolean('is_deleted')->default(0);
      $table->timestamps();
    });        
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::drop('tickets');
  }
}
