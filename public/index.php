<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require '../vendor/autoload.php';

$app = new \Slim\App;
//route endpoint
require_once '../src/routes/endpoint.php';
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
//route revenue
require_once '../src/routes/revenue.php';
//route attribute
require_once '../src/routes/attribute.php';
//route method
require_once '../src/routes/method.php';
//route statistical
require_once '../src/routes/statistical.php';
$app->run();
?>