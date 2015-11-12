<?php

namespace App\Business\Interfaces;

interface IFinancesService {

  public function WithdrawFromAccount($userId, $financeType);

  public function DepositeIntoAccount($userId, $financeType);

  public function UpdateFinances($userId);
}

?>