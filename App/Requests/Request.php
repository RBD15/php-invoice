<?php

namespace App\Requests;

use App\Controllers\HomeController;
use GuzzleHttp\Psr7\ServerRequest;
use Symfony\Component\Routing\Loader\Configurator\RouteConfigurator;
use Symfony\Component\Routing\RequestContext;

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
   $context = new RequestContext();
  //  $routes->add('home','/')->controller(ControllersHomeController::class);
   var_dump($this->request->getHeaders()); 
  }

}

?>