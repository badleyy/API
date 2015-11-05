<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function(Blueprint $table){
            $table->increments('product_id');
            //$table->integer('account_id')->unsigned();
            //$table->foreign('account_id')->references('account_id')->on('accounts');
            $table->string('product_name', 200)->nullable();
            $table->string('product_description', 50)->nullable();
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
        //
        Schema::drop('products');
    }
}
