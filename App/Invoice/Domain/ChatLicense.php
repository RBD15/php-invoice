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
  }
  
  public function get()
  {
    $server= $_ENV['APP_WOLKVOX_SERVER'];
    $headers = ['headers'=>['wolkvox-token'=>$_ENV['APP_WOLKVOX_TOKEN']]];
    $res = $this->client->request('GET','https://wv'.$server.'.wolkvox.com/api/v2/billing.php?api=chat_licenses',$headers);
    $data = json_decode($res->getBody()->getContents());
    return $data->data[0];
  }

}


?>