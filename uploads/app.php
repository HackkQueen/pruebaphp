<?php
    header("Access-Control-Allow-Origin: *");
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();

    $router->mount('/eps', function() use($router){
        $router->post('/', '\App\crud@postAll');
        $router->put('/', '\App\crud@putAll');
        $router->get('/', '\App\crud@getAll');
        $router->delete('/', '\App\crud@deleteAll');
    });

    $router->mount('/bacteriologo', function() use($router){
        $router->post('/', '\App\crud1@postAll');
        $router->put('/', '\App\crud1@putAll');
        $router->get('/', '\App\crud1@getAll');
        $router->delete('/', '\App\crud1@deleteAll');
    });
    
    $router->mount('/ciudad', function() use($router){
        $router->post('/', '\App\crud2@postAll');
        $router->put('/', '\App\crud2@putAll');
        $router->get('/', '\App\crud2@getAll');
        $router->delete('/', '\App\crud2@deleteAll');
    });
    $router->mount('/examenes', function() use($router){
        $router->post('/', '\App\crud3@postAll');
        $router->put('/', '\App\crud3@putAll');
        $router->get('/', '\App\crud3@getAll');
        $router->delete('/', '\App\crud3@deleteAll');
    });
    $router->mount('/examenes_reactivos', function() use($router){
        $router->post('/', '\App\crud4@postAll');
        $router->put('/', '\App\crud4@putAll');
        $router->get('/', '\App\crud4@getAll');
        $router->delete('/', '\App\crud4@deleteAll');
    });
    $router->mount('/ordenes', function() use($router){
        $router->post('/', '\App\crud5@postAll');
        $router->put('/', '\App\crud5@putAll');
        $router->get('/', '\App\crud5@getAll');
        $router->delete('/', '\App\crud5@deleteAll');
    });
    $router->mount('/paciente', function() use($router){
        $router->post('/', '\App\crud6@postAll');
        $router->put('/', '\App\crud6@putAll');
        $router->get('/', '\App\crud6@getAll');
        $router->delete('/', '\App\crud6@deleteAll');
    });
    $router->mount('/proveedor', function() use($router){
        $router->post('/', '\App\crud7@postAll');
        $router->put('/', '\App\crud7@putAll');
        $router->get('/', '\App\crud7@getAll');
        $router->delete('/', '\App\crud7@deleteAll');
    });
    $router->mount('/reactivos', function() use($router){
        $router->post('/', '\App\crud8@postAll');
        $router->put('/', '\App\crud8@putAll');
        $router->get('/', '\App\crud8@getAll');
        $router->delete('/', '\App\crud8@deleteAll');
    });
    $router->mount('/reactivos_proveedor', function() use($router){
        $router->post('/', '\App\crud9@postAll');
        $router->put('/', '\App\crud9@putAll');
        $router->get('/', '\App\crud9@getAll');
        $router->delete('/', '\App\crud9@deleteAll');
    });

    










    $router->run();
?>