<?php

namespace App\Business\Interfaces;

interface ITicketsService {

  public function GetTicketsPerAccount($userId);

  public function PurchaseTicket($raffleId);

  public function RefundTicket($ticketId);
}

?>