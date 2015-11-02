<?php

namespace App\Business\Interfaces;

interface ITicketsService {

	public function GetTicketsPerAccount($accountId);

	public function PurchaseTicket($raffleId);

	public function RefundTicket($ticketId);
}

?>