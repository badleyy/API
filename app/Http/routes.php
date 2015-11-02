<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Tests Routes 
Route::get('/test', 'TestsController@Test' );

// Raffles Routes
Route::get('/raffles', 'RafflesController@GetRaffles');
Route::get('/raffles/{raffle_id}', 'RafflesController@GetRaffleById' );


// Products Routes
Route::get('/products', 'ProductsController@GetProducts');
Route::get('/productsraffles', 'ProductsController@GetProductsWithRaffles');
Route::get('/products/{product_id}', 'ProductsController@GetProductById');