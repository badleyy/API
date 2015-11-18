<?php

namespace App\Business\Interfaces;

interface ITicketsService {

  public function PurchaseTicket($user_id, $raffleId);

  public function RefundTicket($user_id, $ticketId);
}

?>