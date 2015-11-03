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

//Register Routes
Route::post('/register', 'RegistrationController@Register');

//Auth Routes
Route::post('/auth', 'AuthenticationController@Authenticate');

// Products Routes
Route::get('/products', 'ProductsController@GetProducts');
Route::get('/products/{product_id}', 'ProductsController@GetProductById');

// Account Routes
Route::get('accounts/{account_id}', 'AccountsController@GetAccount');
Route::get('accounts/{account_id}/tickets', 'AccountsController@GetTicketsPerAccount');
Route::get('accounts/{account_id}/products', 'AccountsController@GetProductsPerAccount');

//Tickets Routes
Route::post('tickets', 'TicketsController@PurchaseTicket');
Route::post('tickets/{ticket_id}', 'TicketsController@RefundTicket');