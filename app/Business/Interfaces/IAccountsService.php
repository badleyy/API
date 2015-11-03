<?php

namespace App\Business\Interfaces;

interface IAccountsService {

	public function CreateAccount();

	public function GetAccountInformation($accountId);

}

?>