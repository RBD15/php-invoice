<?php

namespace App\Requests;
use GuzzleHttp\Psr7\ServerRequest;

final class Request
{
  private $request;
  public function __construct()
  {
    $this->request = ServerRequest::fromGlobals(
      $_COOKIE,
      $_FILES,
      $_GET,
      $_POST,
      $_REQUEST,
      $_SERVER,
      $GLOBALS
    );
  }

  public function handler()
  {
   var_dump($this->request->getHeaders()); 
  }

}

?>