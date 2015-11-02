<?php

namespace App\Business\Services;

use App\Business\Interfaces\IRafflesService;
use App\Business\Models\RaffleModel;

class RafflesService implements IRafflesService {
	/*
		Gets the total number of raffles available
	*/
	public function GetAllRafflesCount() {
		return RaffleModel::All()->count();
	}

	/*
		Return a subset of all the raffles using skip take
	*/
	public function GetRaffles($skip, $take) {
		return RaffleModel::skip($skip)->take($take)->get();
	}

	/*
		Return an individual raffle based on the raffle id.
	*/
	public function GetRaffleById($raffleId) {
		return RaffleModel::find($raffleId);
	}

	/*
		Returns the raffle with a given product id.
	*/
	public function GetRaffleByProductId($productId) {
		return RaffleModel::where('product_id', $productId)->get();
	}
}

?>