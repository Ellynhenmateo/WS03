<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;
use Framework\Database;

// require '../helpers.php';
// require basePath('Framework/Router.php');
// require basePath('Framework/database.php');

//$config = require basePath('config/db.php');

//db = new Database($config);

$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

if ($basePath !== '' && $basePath !== '/' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

$uri = $uri === '' ? '/' : $uri;
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


// $routes = [
//     '/' => 'controllers/home.php',
//     'listings' => 'controllers/listings/index.php',
//     'listings/create' => 'controllers/create.php',
//     '404' => 'controllers/error/404.php',

// ];

// $uri = $_SERVER['REQUEST_URI'];
// if (array_key_exists($uri, $routes)) {
//     require basePath($routes[$uri]);
// } else {
//     require basePath($routes['404']);
// }