<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Model;

class RaffleModel extends Model {

  protected $table = "raffles";
  protected $primaryKey = "raffle_id";
  protected $visible = array('raffle_id', 'product_id', 'open_date', 'close_date', 'raffle_date', 
  'ticket_price', 'current_num_tickets', 'maximum_number_tickets');

  public function product() {
    return $this->belongsTo('App\Business\Models\ProductModel', 'product_id');
  }
}


?>