<?php

// Namespace
namespace App\Http\Controllers;

use App\Business\Interfaces\ITicketsService;
use App\Business\Models\WebResponseModel;
use Input;
use Auth;

class TicketsController extends Controller {

  protected $_ts;
  protected $userId;

  public function __construct(ITicketsService $ts) {
    $this->_ts = $ts;

  // The global account variable
    $this->userId = Auth::id();
  }

  public function PurchaseTicket() {
    $raffleId = Input::get('raffleId');
    $ticket = $this->_ts->PurchaseTicket($this->userId, $raffleId);
    if($ticket['status']) {
      return response()->json(new WebResponseModel("success", "none", 1, 1, "{}"));
    }
    else {
      return response()->json(new WebResponseModel("failure", $ticket['message'], 1, 1, "{}")); 
    }
  }

  public function RefundTicket($ticketId) {
    $ticket = $this->_ts->RefundTicket($this->userId, $ticketId);
    if($ticket['status']) {
      return response()->json(new WebResponseModel("success", "none", 1, 1, "{}"));
    }
    else {
      return response()->json(new WebResponseModel("failure", $ticket['message'], 1, 1, "{}")); 
    }
  }
}

?>