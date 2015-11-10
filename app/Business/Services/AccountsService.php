<?php

namespace App\Business\Services;

use App\Business\Interfaces\IAccountsService;
use App\Business\Models\UserModel;
use App\Business\Models\AccountModel;
use App\Business\Models\FinanceModel;
use DB;

class AccountsService implements IAccountsService {
  
  /*
    Creats a new account
  */
  public function CreateAccount($information) {
    // Create user first
    $user = new UserModel;
    $user->first_name = $information->firstName;
    $user->last_name = $information->lastName;
    $user->email_address = $information->emailAddress;
    $user->save();

    // Create account
    $account = new AccountModel;
    $account->user_id = $user->user_id;
    $account->username = $information->username;
    $account->password = Hash::make($information->password);
    $account->save();

    // Create financial records
    $finance = new FinanceModel;
    $finance->account_id = $account->account_id;
    $finance->finance_type = "paypal";
    $finance->balance = 0.0;
    $finance->save();
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