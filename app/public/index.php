<?php

declare(strict_types=1);

// ----- CORS -----
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// ----- Error reporting -----
// ? maybe I dont need this cos of xdebug
// but I will include it anyways
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Automatically require files when using classes
// results in cleaner code
require '../autoload.php';

// ----- ROUTER -----
// UrlRouter does not support nesting
// This is intentional as my use case does
// not require nested routes
$router = new \router\UrlRouter();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router->route($uri);
