<?php
namespace App\Invoice\Domain;

use App\Invoice\Domain\BillingItem;

final class WhatsappInteraction extends BillingItem{
 
  public function __construct()
  {
    parent::__construct();
    $this->price = 0.01;
    $this->currency = 'USD';
    $this->name = 'Whatsapp Interactions';
    $this->description = 'S/N';
    $this->init();
  }

  protected function init(){
    $server= $_ENV['APP_WOLKVOX_SERVER'];
    $headers = ['headers'=>['wolkvox-token'=>$_ENV['APP_WOLKVOX_TOKEN']]];
    $res = $this->client->request('GET','https://wv'.$server.'.wolkvox.com/api/v2/billing.php?api=wp_connectors_official',$headers);
    $data = json_decode($res->getBody()->getContents());

    $this->quantity = $data->data[0]->items;
    $this->total = ($this->quantity * $this->price). $this->currency;
  }
  
}

?>