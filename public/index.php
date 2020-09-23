<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
header('Access-Control-Allow-Origin: *');

require '../vendor/autoload.php';

$app = new \Slim\App;
//route brand
require_once '../src/routes/brand.php';
// route category
require_once '../src/routes/category.php';
//route product
require_once '../src/routes/product.php';

$app->run();