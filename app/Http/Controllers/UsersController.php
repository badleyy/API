<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\IUsersService;
use App\Business\Interfaces\IProductsService;
use Auth;
use App\Business\Models\WebResponseModel;

class UsersController extends Controller {

  protected $_ps;
  protected $_us;
  protected $userId;

  public function __construct(IUsersService $us, IProductsService $ps) {
    $this->_ps = $ps;
    $this->_us = $us;

    // The global account variable
    $this->userId = Auth::id();
  }

  /*
      Gets the users account information
  */
  public function GetUserInformation() {
    $userInformation = $this->_us->GetUserInformation($this->userId);
    return response()->json(new WebResponseModel("success", "none", 1, 1,  $userInformation));
  }

  public function GetProductsPerUser() {
    $usersProducts = $this->_ps->GetProductsPerUser($this->userId);
    return response()->json(new WebResponseModel("success", "none", count($usersProducts), 
      $this->_ps->GetProductsCountPerUser($this->userId), $usersProducts));
  }
}

?>