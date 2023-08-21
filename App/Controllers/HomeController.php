<?php 
namespace App\Controllers;

use App\Invoice\Application\Billing;

final class HomeController
{
  public function index()
  {
    $billing = new Billing();
    return $billing;
  }
}


?>