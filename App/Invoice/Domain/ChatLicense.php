<?php

namespace App\Invoice\Domain;
use App\Invoice\Domain\BillingItem;
use App\Invoice\Domain\DTO\BillingItemDTO;

final class ChatLicense extends BillingItem
{
  public function __construct()
  {
    parent::__construct();
    $this->price = 10;
    $this->currency = 'USD';
    $this->name = 'Chat License';
    return $this->get();
  }
  
  private function get(): BillingItemDTO
  {
    $server= $_ENV['APP_WOLKVOX_SERVER'];
    $headers = ['headers'=>['wolkvox-token'=>$_ENV['APP_WOLKVOX_TOKEN']]];
    $res = $this->client->request('GET','https://wv'.$server.'.wolkvox.com/api/v2/billing.php?api=chat_licenses',$headers);
    $data = json_decode($res->getBody()->getContents());

    $quantity = $data->data[0]->items;
    $total = ($quantity * $this->price). $this->currency;
    $this->setDto($this->name, $this->price, $quantity, $total);
    return $this->getDto();
  }

}


?>