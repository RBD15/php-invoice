<?php 

namespace App\Invoice\Domain;

use Dotenv\Dotenv;
use GuzzleHttp\Client;

abstract class BillingItem
{
  protected $client;
  protected $price;
  protected $currency;
  public function __construct()
  {
    $this->client = new Client(['verify' => false]);
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
    $dotenv->load();
  }



}

?>