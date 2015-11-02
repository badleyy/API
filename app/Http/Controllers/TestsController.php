<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\ITicketsService;
use App\Business\Interfaces\IProductsService;
use App\Business\Models\WebResponseModel;

class TestsController extends NoAuthController {

	protected $_service;

	public function __construct(ITicketsService $service)
    {
    	//parent::__construct();
    	$this->_service = $service;
    }

    public function Test() {
    	$products = $this->_service->GetTicketsPerAccount(2);
    	return response()->json(new WebResponseModel("success", "none", 2, 2, $products));
    }
}

?>