<?php

namespace App\Business\Services;

use App\Business\Interfaces\IProductsService;
use App\Business\Models\ProductModel;
use DB;

class ProductsService implements IProductsService {
	/*
		Gets the number of products in the database
	*/
	public function GetAllProductsCount() {
		return ProductModel::All()->count();
	}

	/*
		Gets the number of products the users has tickets for
	*/
	public function GetProductsCountPerAccount($accountId) {
		return DB::table('accounts_raffles')->where('account_id', $accountId)
		->join('raffles', 'accounts_raffles.raffle_id', '=', 'raffles.raffle_id')
		->join('products', 'raffles.product_id', '=', 'products.product_id')->count();
	}

	/*
		Creates a new product
	*/
	public function CreateProduct() {

	}

	/*
		Gets a list of products for the account
	*/
	public function GetProductsPerAccount($accountId) {
		// Look up the tickets for the account and join them with the raffle and product information
		// This may need a little more rework for multiple tickets to a raffle
		return DB::table('tickets')->where('tickets.account_id', $accountId)
		->join('raffles', 'tickets.raffle_id', '=', 'raffles.raffle_id')
		->join('products', 'raffles.product_id', '=', 'products.product_id')
		->select('tickets.ticket_id', 'products.product_id', 'products.product_name', 'products.product_description',
			'raffles.raffle_id', 'raffles.open_date', 'raffles.close_date', 'raffles.raffle_date', 'raffles.ticket_price',
			'raffles.current_num_tickets', 'raffles.maximum_num_tickets')->get();
	}

	/*
		Gets a subset of the products including the raffle information
	*/
	public function GetProducts($skip, $take) {
		return DB::table('raffles')->join('products', 'raffles.product_id', '=', 'products.product_id')->skip($skip)->take($take)
		->select('products.product_id', 'products.product_name', 'products.product_description',
				 'raffles.raffle_id', 'raffles.open_date', 'raffles.close_date', 'raffles.raffle_date', 'raffles.ticket_price',
				 'raffles.current_num_tickets', 'raffles.maximum_num_tickets')->get();
	}

	/*
		Returns a single product by the id
	*/
	public function GetProductById($productId) {
				return DB::table('raffles')->where('products.product_id', $productId)
				->join('products', 'raffles.product_id', '=', 'products.product_id')
				->select('products.product_id', 'products.product_name', 'products.product_description',
				 	'raffles.raffle_id', 'raffles.open_date', 'raffles.close_date', 'raffles.raffle_date', 'raffles.ticket_price',
				 	'raffles.current_num_tickets', 'raffles.maximum_num_tickets')->first();
	}
}

?>