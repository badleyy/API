<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\IAccountsService;
use App\Business\Interfaces\IProductsService;
use Auth;
use App\Business\Models\WebResponseModel;

class AccountsController extends Controller {

	protected $_ps;
    protected $_as;
    protected $accountId;

	public function __construct(IAccountsService $as, IProductsService $ps)
    {
    	$this->_ps = $ps;
        $this->_as = $as;

        // The global account variable
        $this->accountId = Auth::user()->account_id;
    }

    /*
        Gets the users account information
    */
    public function GetAccountInformation() {
        $accountInformation = $this->_as->GetAccountInformation($this->accountId);
        return response()->json(new WebResponseModel("success", "none", 1, 1,  $accountInformation));
    }

    public function GetProductsPerAccount() {
        $accountProducts = $this->_ps->GetProductsPerAccount($this->accountId);
        return response()->json(new WebResponseModel("success", "none", count($accountProducts), 
            $this->_ps->GetProductsCountPerAccount($this->accountId),  $accountProducts));   
    }
}

?>