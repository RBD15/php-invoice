<?php 

namespace App\Invoice\Domain;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use App\Invoice\Domain\DTO\BillingItemDTO;

abstract class BillingItem
{
  // protected $quantity;
  protected $price;
  protected $currency;
  protected $name;

  private BillingItemDTO $dto;
  protected $client;

  public function __construct()
  {
    $this->client = new Client(['verify' => false]);
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
    $dotenv->load();
  }
  
  public function getDto(): BillingItemDTO
  {
    return $this->dto;
  }

  public function setDto($item, $price, $quantity, $total)
  {
    $newDto = new BillingItemDTO($item, $price, $quantity, $total);
    $this->dto = $newDto;
  }
}

?>