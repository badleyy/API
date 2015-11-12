<?php

namespace App\Business\Interfaces;

interface IUsersService {

  public function CreateUser($information);

  public function GetUserInformation($userId);
}

?>