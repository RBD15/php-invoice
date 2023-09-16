<?php 
namespace App\Invoice\Application;

use App\Invoice\Domain\ChatLicense;
use App\Invoice\Domain\DTO\BillingBodyDTO;

final class Billing
{
  private $billingItems = array();
  private BillingBodyDTO $body;
  private $currency;
  public function __construct()
  {    
    $this->currency = 'USD';
    $this->body = new BillingBodyDTO('Operation Bla bla', '123456789', date('Y-m-d'));
    array_push($this->billingItems,new ChatLicense());
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

  public function getCurrency()
  {
    return $this->currency;
  }
}


?>