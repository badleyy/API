<?php

namespace App\Business\Interfaces;

interface IProductsService {

  public function GetAllProductsCount();

  public function GetProductsCountPerAccount($accountId);

  public function CreateProduct();

  public function GetProductsPerAccount($accountId);

  public function GetProducts($skip, $take);

  public function GetProductById($productId);

}

?>