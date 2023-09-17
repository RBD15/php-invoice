# Invoice Project

A basic PHP Invoice Project

## Requirements

1. PHP 8.1.0
2. Guzzle and Slim

## Description
A webpage with Login,Register,Dashboard and Invoice Pages, Billing object contains a BillingItems array.

## Steps

1. git clone
2. compose install
3. Connect data source creating a new BillingItem class for every billing item.
4. Billing Item contains:
  ```
  protected $quantity;
  protected $price;
  protected $currency;
  protected $name;
  protected $description;
  protected $total;
  ```