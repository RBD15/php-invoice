<?php 
namespace App\Invoice\Domain\DTO;

final class BillingItemDTO
{
  private $item;
  private $price;
  private $quantity;
  private $total;
  private $description;

  public function __construct($item, $price, $quantity,$description, $total)
  {
    $this->item = $item;
    $this->description = $description;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->total = $total;
  }

  public function getItem()
  {
    return $this->item;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function getTotal()
  {
    return $this->total;
  }

  public function getDescription()
  {
    return $this->description;
  }
}


?>