<?php

use App\Core\Router;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/conf.php';

$router = new Router();
$result = $router->match($_SERVER['REQUEST_URI']);

if(!$result) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
?>