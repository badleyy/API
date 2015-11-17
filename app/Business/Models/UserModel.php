<?php

namespace App\Business\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

  use Authenticatable, Authorizable, CanResetPassword;

  protected $table = "users";
  protected $primaryKey = "user_id";
  protected $fillable = ['username', 'password', 'first_name', 'last_name', 'email_address'];

  public function getRememberToken() {
   return null; // not supported
 }

 public function setRememberToken($value) {
   // not supported
 }

 public function getRememberTokenName() {
   return null; // not supported
 }

  /**
  * Overrides the method to ignore the remember token.
  */
 public function setAttribute($key, $value) {
    $isRememberTokenAttribute = $key == $this->getRememberTokenName();
    if (!$isRememberTokenAttribute)
    {
      parent::setAttribute($key, $value);
    }
  }
}


?>