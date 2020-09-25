<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
header('Access-Control-Allow-Origin: *');

require '../vendor/autoload.php';

$app = new \Slim\App;
//route customer
require_once '../src/routes/customer.php';
//route brand
require_once '../src/routes/brand.php';
// route category
require_once '../src/routes/category.php';
//route product
require_once '../src/routes/product.php';
//route storage
require_once '../src/routes/storage.php';
//route bill
require_once '../src/routes/billing.php';
$app->run();