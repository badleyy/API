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
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('user_id')->on('users');
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
