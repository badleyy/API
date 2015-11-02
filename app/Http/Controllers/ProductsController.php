<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\IProductsService;
use App\Business\Models\WebResponseModel;
use Input;

class ProductsController extends NoAuthController {

	protected $_ps;

	public function __construct(IProductsService $ps)
    {
    	//parent::__construct();
    	$this->_ps = $ps;
    }

    /*
		Gets all the products. 
		Uses a skip take approach to return a subset of all the raffles
    */
	protected function GetProducts() {
		// Default skip take
		$skip = 0;
		$take = 50;
		// Checks to see if skip and take are supplied as parameters
		if(Input::has('skip') && Input::has('take')) {
			$skip = Input::get('skip');
			$take = Input::get('take');
		}
		// Gets the raffles subset
		$products = $this->_ps->GetProducts($skip, $take);
		// returns the response;
		return response()->json(new WebResponseModel("success", "none", count($products), $this->_ps->GetAllProductsCount(), $products));
	}

	/*
		Gets all the products with the raffle information included. 
		Uses a skip take approach to return a subset of all the raffles
	*/
	protected function GetProductsWithRaffles() {
		// Default skip take
		$skip = 0;
		$take = 50;
		// Checks to see if skip and take are supplied as parameters
		if(Input::has('skip') && Input::has('take')) {
			$skip = Input::get('skip');
			$take = Input::get('take');
		}
		// Gets the raffles subset
		$productswraffles = $this->_ps->GetProductsWithRaffles($skip, $take);
		// returns the response;
		return response()->json(new WebResponseModel("success", "none", count($productswraffles), $this->_ps->GetAllProductsCount(), 
													 $productswraffles));
	}

	/*
		Gets an individual raffle by the raffle id.
	*/
	protected function GetProductById($productId) {
		$raffle = $this->_ps->GetProductById($productId);
		return response()->json(new WebResponseModel("success", "none", 1, 1, $raffle));
	}
}

?>