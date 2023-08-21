<?php

namespace App\Requests;

use Slim\Views\PhpRenderer;
use GuzzleHttp\Psr7\Request;
use Slim\Factory\AppFactory;
use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface;
use Slim\Factory\ServerRequestCreatorFactory;


final class Requests
{
  // private $request;
  private $app;
  public function __construct()
  {
    AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
    ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);
  
    $this->app = AppFactory::create();
    // Add error middleware
    $this->app->addErrorMiddleware(true, true, true);

    // Add routes
    $this->app->get('/', function (Request $request, ResponseInterface $response) {
        $controller = new HomeController();
        $renderer = new PhpRenderer(__DIR__.'/../Views/');
        return $renderer->render($response, "Invoice.php", ['billing'=>$controller->index()]);
    });

  }

  public function handler()
  { 
    $this->app->run();
  }

}

?>