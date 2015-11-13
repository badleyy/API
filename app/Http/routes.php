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

// Routes that dont need authentication
//Register Routes
Route::post('/register', 'RegistrationController@Register');

//Auth Routes
Route::get('/auth', 'AuthenticationController@Authenticate');

// Tests Routes 
Route::get('/test', 'TestsController@Test' );


// Routes that need authentication
Route::group(['middleware' => ['before' => 'jwt.auth', 'after' => 'jwt.refresh']], function() {

	// Tests Routes 
	//Route::get('/test', 'TestsController@Test' );

	// Products Routes
	Route::get('/products', 'ProductsController@GetProducts');
	Route::get('/products/{product_id}', 'ProductsController@GetProductById');

	// Account Routes
	Route::get('users/{user_id}', 'UsersController@GetUserInformation');
	Route::get('users/{user_id}/products', 'UsersController@GetProductsPerUser');

	//Tickets Routes
	Route::post('tickets', 'TicketsController@PurchaseTicket');
	Route::delete('tickets/{ticket_id}', 'TicketsController@RefundTicket');
});

