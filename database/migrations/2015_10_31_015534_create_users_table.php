<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    //
    Schema::create('users', function(Blueprint $table){
      $table->increments('user_id');
      $table->string('username', 50)->nullable();
      $table->string('password', 100  )->nullable();
      $table->string('first_name', 50)->nullable();
      $table->string('last_name', 50)->nullable();
      $table->string('email_address', 50)->nullable();
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
    Schema::drop('users');
  }
}
