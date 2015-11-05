<?php

namespace App\Business\Services;

use App\Business\Interfaces\IAccountsService;
use DB;

class AccountsService implements IAccountsService {
	
	/*
		Creats a new account
	*/
	public function CreateAccount() {

	}

	/*
		Returns information about the account such as finances username, first name etc
	*/
	public function GetAccountInformation($accountId) {
			return DB::table('accounts')->where('accounts.account_id', $accountId)
			->join('users', 'accounts.user_id', '=', 'users.user_id')
			->join('finances', 'accounts.account_id', '=', 'finances.account_id')
			->select('accounts.account_id', 'accounts.username', 'users.first_name', 'users.last_name', 'users.email_address', 
				'finances.finance_type', 'finances.balance')->first();
	}
}

?>