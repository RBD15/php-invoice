<?php 

$billingRows = '';

$billingBody = '
<div class="col-sm-6">
<div class="text-muted">
    <h5 class="font-size-16 mb-3">Billed To:</h5>
    <h5 class="font-size-15 mb-2">'.$billing->getBody()->billedTo.'</h5>
    <p class="mb-1">4068 Post Avenue Newfolden, MN 56738</p>
    <p class="mb-1">PrestonMiller@armyspy.com</p>
    <p>001-234-5678</p>
</div>
</div>
<div class="col-sm-6">
<div class="text-muted text-sm-end">
    <div>
        <h5 class="font-size-15 mb-1">Invoice No:</h5>
        <p>#'.$billing->getBody()->invoicedNumber.'</p>
    </div>
    <div class="mt-4">
        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
        <p>'.$billing->getBody()->invoicedDate.'</p>
    </div>
    <div class="mt-4">
        <h5 class="font-size-15 mb-1">Order No:</h5>
        <p>#1123456</p>
    </div>
</div>
</div>
';

$subTotal = 0;
$discount = 0;
$shippingCost = 0;
$taxCost = 0;
foreach($billing->getItems() as $key => $item){
  $subTotal = $subTotal+ (int) $item->getTotal();
  $billingRows = $billingRows . '<tr>
  <th scope="row">'.$key.'</th>
  <td>
      <div>
          <h5 class="text-truncate font-size-14 mb-1">'.$item->getItem().'</h5>
          <p class="text-muted mb-0">Watch, Black</p>
      </div>
  </td>
  <td> $'. $item->getPrice().'</td>
  <td>'.$item->getQuantity().'</td>
  <td class="text-end">$'. $item->getTotal().'</td>
  </tr>';
}
$total = $subTotal - $discount;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body{
    margin-top:20px;
    background-color:#eee;
    }
    
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 1rem;
    }
  </style>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Invoice <?php echo Ramsey\Uuid\Uuid::uuid4()->toString() ?><span class="badge bg-success font-size-12 ms-2">Pending</span></h4>
                        <div class="mb-4">
                            <h2 class="mb-1 text-muted">Bootdey.com</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                            <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <?php echo $billingBody; ?>
                    </div>
                    
                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $billingRows;?>
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end"><?php echo $subTotal?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Discount :</th>
                                        <td class="border-0 text-end">- <?php echo $discount?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Shipping Charge :</th>
                                        <td class="border-0 text-end">$<?php echo $shippingCost?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Tax</th>
                                        <td class="border-0 text-end">$<?php echo $taxCost?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end"><h4 class="m-0 fw-semibold"><?php echo $subTotal?></h4></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary w-md">Send</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>