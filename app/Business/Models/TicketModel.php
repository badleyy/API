<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model {

	protected $table = "tickets";
	protected $primaryKey = "ticket_id";
	protected $visible = array('ticket_id', 'raffle_id');
}


?>