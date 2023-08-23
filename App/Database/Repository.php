<?php 

namespace App\Database;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

final class Repository
{
  public function __construct()
  {

    $capsule = new Capsule();
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3305',
        'database' => 'test',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ]);

    $capsule->setEventDispatcher(new Dispatcher(new Container));

    // Make this Capsule instance available globally via static methods... (optional)
    // $capsule->setAsGlobal();

    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();
  }
}


?>