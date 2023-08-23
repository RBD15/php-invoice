<?php

namespace App\Requests;

use App\Database\Repository;
use App\Routes\Router;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;


final class Requests
{
  private $app;
  public function __construct()
  {
    AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
    ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);

    $this->app = AppFactory::create();
    // Add error middleware
    $this->app->addErrorMiddleware(true, true, true);
    $repository = new Repository();

    $router = new Router($this->app);
    $router->init();
  }

  public function handler()
  { 
    $this->app->run();
  }

}

?>