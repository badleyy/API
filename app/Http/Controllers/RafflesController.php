<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\IRafflesService;
use App\Business\Models\WebResponseModel;
use Input;

class RafflesController extends NoAuthController {

	protected $_rs;

	public function __construct(IRafflesService $rs)
    {
    	//parent::__construct();
    	$this->_rs = $rs;
    }

	/*
		Gets all the raffles. 
		Uses a skip take approach to return a subset of all the raffles
	*/
	protected function GetRaffles() {
		// Default skip take
		$skip = 0;
		$take = 50;
		// Checks to see if skip and take are supplied as parameters
		if(Input::has('skip') && Input::has('take')) {
			$skip = Input::get('skip');
			$take = Input::get('take');
		}
		// Gets the raffles subset
		$raffles = $this->_rs->GetRaffles($skip, $take);
		// returns the response;
		return response()->json(new WebResponseModel("success", "none", count($raffles), $this->_rs->GetAllRafflesCount(), $raffles));
	}

	/*
		Gets an individual raffle by the raffle id.
	*/
	protected function GetRaffleById($raffleId) {
		$raffle = $this->_rs->GetRaffleById($raffleId);
		return response()->json(new WebResponseModel("success", "none", 1, 1, $raffle));
	}
}

?>l