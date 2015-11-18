<?php

namespace App\Business\Services;

use App\Business\Interfaces\ITicketsService;
use App\Business\Interfaces\IFinancesService;
use App\Business\Models\TicketModel;
use App\Business\Models\RaffleModel;
use App\Business\Models\UserModel;

class TicketsService implements ITicketsService {

  protected $_fs;


  public function __construct(IFinancesService $fs) {
    $this->_fs = $fs;
  }

  /*
    Purcahses a ticket
  */
  public function PurchaseTicket($userId, $raffleId) {
    $checkout = array();
    $checkout['status'] = true;
    // Using the raffle id get the raffle information
    $raffle = RaffleModel::find($raffleId);
    // Using the raffle ticket price, check to see if the user can buy a ticket.
    $user = UserModel::find($userId);
    if($user->finance->balance - $raffle->ticket_price >= 0.00) {
      // They can buy a ticket
      // Check to see if there ar eenough tickets available for the raffle. This needs database locking somehow
      if(($raffle->current_num_tickets + 1 ) <= $raffle->maximum_num_tickets) {
        // Create the new ticket
        $ticket = new TicketModel;
        $ticket->user_id = $userId;
        $ticket->raffle_id = $raffleId;
        $ticket->save();

        // Deduct the ticket price from the account balance
        $user->finance->balance = $user->finance->balance - $raffle->ticket_price;
        $user->finance->save();
        // update the raffles current ticket field
        $raffle->current_num_tickets ++;
        $raffle->save();
        // return successful status code
        return $checkout;
      }
      else {
        // No more tickets to sell
        $checkout['status'] = false;
        $checkout['message'] = "There are no more tickets to sell.";
        return $checkout;
      }
    }
    else {
      // The user doesn't have enough money in their account
      $checkout['status'] = false;
      $checkout['message'] = "Not enough money in account.";
      return $checkout;
    }
  }

  /*
    Refunds a ticket
  */
  public function RefundTicket($userId, $ticketId) {
    $return = array();
    $return['status'] = true;
    // Get the raffle information from the ticket
    $ticket = TicketModel::find($ticketId);
    // Decrement the current number of tickets column for the raffle
    $ticket->raffle->current_num_tickets --;
    $ticket->raffle->save();
    // Refund the ticket price to the users account
    $user = UserModel::find($userId);
    $user->finance->balance = $user->finance->balance + $ticket->raffle->ticket_price;
    $user->finance->save();
    // Delete the ticket ( acutally setting the isDeleted to true)
    $ticket->is_deleted = 1;
    $ticket->save();

    return $return;
  }
}

?>