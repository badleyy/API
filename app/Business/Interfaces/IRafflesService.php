<?php

namespace App\Business\Interfaces;

interface IRafflesService {

	public function GetAllRafflesCount();

	public function GetRaffles($skip, $take);

	public function GetRaffleById($raffleId);

	public function GetRaffleByProductId($productId);
}

?>