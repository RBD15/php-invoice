<?php 
namespace App\Routes;

use Slim\Views\PhpRenderer;
use GuzzleHttp\Psr7\Request;
use App\Controllers\HomeController;
use App\User\Domain\User;
use Psr\Http\Message\ResponseInterface;




final class Router
{
  private $app;
  private $renderer;
  public function __construct($app)
  {
    $this->app = $app;
    $this->renderer = new PhpRenderer(__DIR__.'/../Views/');
  }

  public function init(): void
  {

    // Add routes
    $this->app->get('/', function (Request $request, ResponseInterface $response) {
      $controller = new HomeController();
      return $this->renderer->render($response, "Invoice.php", ['billing'=>$controller->index()]);
    });

    $this->app->get('/login', function(Request $request, ResponseInterface $response){
      return $this->renderer->render($response, "Login.php");
    });

    $this->app->get('/user', function(Request $request, ResponseInterface $response){
      $users = User::all()->toArray();
      $response->getBody()->write(createResponse(['users'=>$users],200));
      return $response;
    });

  }

}


?>