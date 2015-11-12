<?php

namespace App\Business\Services;

use App\Business\Models\UserModel;
use App\Business\Models\FinanceModel;
use App\Business\Interfaces\IUsersService;
use DB;
use Hash;

class UsersService implements IUsersService {
  
  /*
    Creates a new user
  */
  public function CreateUser($information) {
    // The regisration object which will hold the results of the function
    $regisration = array();
    $regisration['status'] = true;

    // Check to see if account already exists
    if(UserModel::where('username', '=', $information['username'])->exists() || 
       UserModel::where('email_address', '=', $information['emailAddress'])->exists()) {
      $regisration['status'] = false;
      $regisration['message'] = "account already exists";
      return $regisration;
    }

    // Create user first
    $user = new UserModel;
    $user->username = $information['username'];
    $user->password = Hash::make($information['password']);
    $user->first_name = $information['firstName'];
    $user->last_name = $information['lastName'];
    $user->email_address = $information['emailAddress'];
    $user->save();

    // Create financial records
    $finance = new FinanceModel;
    $finance->account_id = $account->account_id;
    $finance->finance_type = "paypal";
    $finance->balance = 0.0;
    $finance->save();

    return $regisration;
  }

  /*
    Returns information about the user such as finances username, first name etc
  */
  public function GetUserInformation($userId) {
      return DB::table('users')->where('users.user_id', $userId)
      ->join('finances', 'users.user_id', '=', 'finances.user_id')
      ->select('users.user_id', 'users.username', 'users.first_name', 'users.last_name', 'users.email_address', 
        'finances.finance_type', 'finances.balance')->first();
  }
}

?>