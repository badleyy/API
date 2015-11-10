<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRafflesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    //
    Schema::create('raffles', function(Blueprint $table){
      $table->increments('raffle_id');
      $table->integer('product_id')->unsigned();
      $table->foreign('product_id')->references('product_id')->on('products');
      $table->timestamp('open_date');
      $table->timestamp('close_date');
      $table->timestamp('raffle_date');
      $table->decimal('ticket_price', 5, 2)->nullable(); // 5 is a hundred
      $table->integer('current_num_tickets');
      $table->integer('maximum_num_tickets');
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
    Schema::drop('raffles');
  }
}
