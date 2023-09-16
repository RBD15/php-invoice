<?php

namespace App\Invoice\Domain;
use App\Invoice\Domain\BillingItem;

final class ChatLicense extends BillingItem
{
  public function __construct()
  {
    parent::__construct();
    $this->price = 10;
    $this->currency = 'USD';
    $this->name = 'Name item';
    $this->description = 'S/N';
    $this->init();
  }

  protected function init(){
    $headers = ['headers'=>['Authorization'=>$_ENV['APP_TOKEN']]];
    $res = $this->client->request('GET',$_ENV['APP_URL'],$headers);
    $data = json_decode($res->getBody()->getContents());

    $this->quantity = $data->data[0]->items;
    $this->total = ($this->quantity * $this->price). $this->currency;
  }

}


?>