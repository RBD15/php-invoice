<?php 
namespace App\Invoice\Domain\DTO;

final class BillingBodyDTO
{

  private $billedTo;
  private $invoicedNumber;
  private $invoicedDate;

  public function __construct($billedTo, $invoicedNumber, $invoicedDate)
  {
    $this->billedTo = $billedTo;
    $this->invoicedNumber = $invoicedNumber;
    $this->invoicedDate = $invoicedDate;
  }
  
  public function get()
  {
    $dto = ['billedTo'=>$this->billedTo,'invoicedNumber'=>$this->invoicedNumber, 'invoicedDate'=> $this->getInvoicedDate()];
    return json_decode(json_encode($dto));
  }

  public function getBilledTo()
  {
    return $this->billedTo;
  }

  public function getInvoicedNumber()
  {
    return $this->invoicedNumber;
  }

  public function getInvoicedDate()
  {
    return $this->invoicedDate;
  }

}


?>