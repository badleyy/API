<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model {

  protected $table = "products";
  protected $primaryKey = "product_id";
  protected $visible = array('product_id', 'product_name', 'product_description');

  public function raffle() {
    return $this->hasOne('App\Business\Models\RaffleModel', 'product_id');
  }
}


?>