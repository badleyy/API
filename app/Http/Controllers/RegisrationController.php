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
    $registration = $this->as->CreateAccount($information);
    if($registration['status']) {
      return response()->json(new WebResponseModel("success", "none", 0, 0, "{}"));
    }
    else {
      return response()->json(new WebResponseModel("fail", $registration['message'], 0, 0, "{}"));
    }
  }
}

?>