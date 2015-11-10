<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\IProductsService;
use App\Business\Interfaces\IAccountsService;
use App\Business\Models\WebResponseModel;
use Auth;

class TestsController extends Controller {

  protected $_service;
  protected $accountId;

  public function __construct(IProductsService $service) {
    $this->_service = $service;
    $this->accountId = 2;
  }

  public function Test() {
    $accountProducts = $this->_service->GetProductsPerAccount($this->accountId);
    return response()->json(new WebResponseModel("success", "none", count($accountProducts), 
      $this->_service->GetProductsCountPerAccount($this->accountId),  $accountProducts));   
  }
}

?>