<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    //
    Schema::create('finances', function(Blueprint $table){
      $table->increments('finance_id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->references('user_id')->on('users');
      $table->string('finance_type', 50)->nullable();
      $table->decimal('balance', 6, 2)->nullable(); // 6 is a thousand
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
    Schema::drop('finances');
  }
}
