<?php

namespace App\Business\Models;


class WebResponseModel {

  public $status = "success";
  public $message = "none";
  public $count = 0;
  public $total = 0;
  public $data = [];
  
  public function __construct($status, $message, $count, $total, $data) {
    $this->status = $status;
    $this->message = $message;
    $this->count = $count;
    $this->total = $total;
    $this->data = $data;
  }
}


?>