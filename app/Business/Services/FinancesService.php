<?php

namespace App\Business\Services;

use App\Business\Interfaces\IFinancesService;
use App\Business\Models\FinanceModel;
use DB;

class FinancesService implements IFinancesService {
	
	/*
		Withdraws money from the account specified
	*/
	public function WithdrawFromAccount($accountId, $financeType) {

	}

	/*
		Deposites money into the account specified
	*/
	public function DepositeIntoAccount($accountId, $financeType) {

	}

	/*
		Updates the users finance information
	*/
	public function UpdateFinances($accountId) {

	}
}

?>