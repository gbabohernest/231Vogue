<?php

session_start();

use Core\Router;

define("BASE_PATH", dirname(__DIR__));
const DB_PASSWORD = '';


require BASE_PATH . DIRECTORY_SEPARATOR . 'Core/functions.php';


spl_autoload_register(function ($class) {

    $class = str_replace("\\", DIRECTORY_SEPARATOR, "$class");
    require base_path("{$class}.php");
});


$router = new Router();


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require base_path('routes.php');

$requestMethod = $_POST['__request_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->routeToController($uri, $requestMethod);

