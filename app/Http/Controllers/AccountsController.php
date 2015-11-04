<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\ITicketsService;
use App\Business\Models\WebResponseModel;

class AccountsController extends Controller {

	protected $_ts;

	public function __construct(ITicketsService $ts)
    {
    	$this->_ts = $ts;
    }

    public function GetAccount() {

    }

    public function GetTicketsPerAccount() {

    }

    public function GetProductsPerAccount() {

    }
}

?>