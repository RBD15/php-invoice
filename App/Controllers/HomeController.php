<?php 
namespace App\Controllers;

use App\Invoice\Domain\ChatLicense;
use App\Invoice\Domain\WhatsappConnector;

final class HomeController
{
  public function index()
  {
    // $billingItem = new ChatLicense();
    // $result = $billingItem->get();
    $billingItem = new WhatsappConnector();
    $result = $billingItem->get();
    return $result;
  }
}


?>