<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model {

  protected $table = "tickets";
  protected $primaryKey = "ticket_id";
  protected $visible = array('ticket_id', 'raffle_id');

  public function raffle() {
    return $this->belongsTo('App\Business\Models\RaffleModel', 'raffle_id');
  }

}


?>