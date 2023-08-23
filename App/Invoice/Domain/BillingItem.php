<?php 

namespace App\Invoice\Domain;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use App\Invoice\Domain\DTO\BillingItemDTO;

abstract class BillingItem
{
  protected $quantity;
  protected $price;
  protected $currency;
  protected $name;
  protected $description;
  protected $total;

  private BillingItemDTO $dto;
  protected $client;

  public function __construct()
  {
    $this->client = new Client(['verify' => false]);
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
    $dotenv->load();
  }

  protected abstract function init();
  
  public function getDto(): BillingItemDTO
  {
    if(!isset($this->dto)){
      $this->createDto();
    }

    return $this->dto;
  }

  private function createDto()
  {
    $newDto = new BillingItemDTO($this->name, $this->price,$this->quantity,$this->description, $this->total);
    $this->dto = $newDto;
  }
}

?>