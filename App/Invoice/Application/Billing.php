<?php 
namespace App\Invoice\Application;

use App\Invoice\Domain\ChatLicense;
use App\Invoice\Domain\DTO\BillingBodyDTO;
use App\Invoice\Domain\WhatsappConnector;

final class Billing
{
  private $billingItems = array();
  private BillingBodyDTO $body;
  public function __construct()
  {    
    $this->body = new BillingBodyDTO('Operation Bla bla', '123456789', date('Y-m-d'));
    array_push($this->billingItems,new ChatLicense());
    array_push($this->billingItems,new WhatsappConnector());
  }

  public function getItems() {
    $billingDtoItems = [];
    foreach($this->billingItems as $items) {
      array_push($billingDtoItems, $items->getDto());
    }
    return $billingDtoItems;
  }

  public function getBody()
  {
    return $this->body->get();
  }

}


?>