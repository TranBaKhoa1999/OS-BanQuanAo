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
//change status bill
$app->put('api/bills/update-status/{id}', function ($request, $response, $args) {
    $id_billing = $request->getAtrribute('id');
    $status = $request->getParam('status');
    $service = new BillingService();
    echo json_encode($service->ChangeStatusBill($id_billing,$status));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>