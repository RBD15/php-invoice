<?php

use App\Requests\Request;

require_once '../vendor/autoload.php';

$request = new Request();
$request->handler();

?>