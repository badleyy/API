<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\ITicketsService;
use App\Business\Models\WebResponseModel;
use Auth;

class TestsController extends Controller {

	protected $_service;

	public function __construct(ITicketsService $service) {
    	$this->_service = $service;
    }

    public function Test() {
    	return Auth::user()->account_id;
    	//$products = $this->_service->GetTicketsPerAccount(2);
    	//return response()->json(new WebResponseModel("success", "none", 2, 2, $products));
    }
}

?>