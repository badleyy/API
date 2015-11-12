<?php

namespace App\Business\Interfaces;

interface IProductsService {

  public function GetAllProductsCount();

  public function GetProductsCountPerUser($userId);

  public function CreateProduct();

  public function GetProductsPerUser($userId);

  public function GetProducts($skip, $take);

  public function GetProductById($productId);

}

?>