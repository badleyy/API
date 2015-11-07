<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Models\WebResponseModel;
use App\Business\Interfaces\IAccountsService;
use Input;

class RegistrationController extends Controller {

	protected $_as;

	public function __construct(IAccountsService $as) {
    	$this->as = $as;
    }

    public function Register() {
    	$information = Input::all();
    	dd($information);
    }
}

?>