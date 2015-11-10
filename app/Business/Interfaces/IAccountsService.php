<?php

namespace App\Business\Interfaces;

interface IAccountsService {

  public function CreateAccount($information);

  public function GetAccountInformation($accountId);

}

?>