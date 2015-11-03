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
		Creates a new product
	*/
	public function CreateProduct() {

	}

	/*
		Gets a list of products for the account
	*/
	public function GetProductsPerAccount($accountId) {
		
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
		return ProductModel::find($productId);
	}
}

?>