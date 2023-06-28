<?php
    header("Access-Control-Allow-Origin: *");
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();

    $router->mount('/region', function() use($router){
        $router->post('/', '\App\crud@postAll');
        $router->put('/', '\App\crud@putAll');
        $router->get('/', '\App\crud@getAll');
        $router->delete('/', '\App\crud@deleteAll');
    });

    $router->mount('/pais', function() use($router){
        $router->post('/', '\App\crud1@postAll');
        $router->put('/', '\App\crud1@putAll');
        $router->get('/', '\App\crud1@getAll');
        $router->delete('/', '\App\crud1@deleteAll');
    });
    
    $router->mount('/departamento', function() use($router){
        $router->post('/', '\App\crud2@postAll');
        $router->put('/', '\App\crud2@putAll');
        $router->get('/', '\App\crud2@getAll');
        $router->delete('/', '\App\crud2@deleteAll');
    });
    $router->mount('/campers', function() use($router){
        $router->post('/', '\App\crud3@postAll');
        $router->put('/', '\App\crud3@putAll');
        $router->get('/', '\App\crud3@getAll');
        $router->delete('/', '\App\crud3@deleteAll');
    });
    $router->run();
?>