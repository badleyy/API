<?php

namespace App\Business\Interfaces;

interface IFinancesService {

	public function WithdrawFromAccount($accountId, $financeType);

	public function DepositeIntoAccount($accountId, $financeType);
}

?>