<?php

use App\Requests\Requests;

require_once '../vendor/autoload.php';

error_reporting(E_ALL);

try {
  $request = new Requests();
  $request->handler();
} catch (Exception $e) {
  createResponse($e->getMessage(),$e->getCode());
}


?>