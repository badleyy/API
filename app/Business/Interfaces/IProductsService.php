<?php

namespace App\Business\Interfaces;

interface IProductsService {

	public function GetAllProductsCount();

	public function GetProducts($skip, $take);

	public function GetProductById($productId);

	public function GetProductsWithRaffles($skip, $take);
}

?>