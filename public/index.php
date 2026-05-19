<?php

require __DIR__ . '/../vendor/autoload.php';




use Framework\Router;
use Framework\Session;

Session::start();



require '../helpers.php';

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


$router->route($uri);