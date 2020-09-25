<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/billingService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/bills', function ($request, $response, $args) {
    $service = new BillingService();
    echo json_encode($service->GetAllBills());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single brand
$app->get('/api/bills/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new BillingService();
    echo json_encode($service->GetSingleBill($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});


?>