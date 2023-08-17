<?php

use App\Requests\Request;

require_once '../vendor/autoload.php';

error_reporting(E_ALL);

try {
  $request = new Request();
  $request->handler();
  // createResponse($request->handler(),200);
} catch (Exception $e) {
  createResponse($e->getMessage(),$e->getCode());
}


?>