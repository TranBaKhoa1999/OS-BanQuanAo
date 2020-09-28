<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/methodService.php';
// $app = new \Slim\App;


//Get All shipping method
$app->get('/api/shipping', function ($request, $response, $args) {
    $service = new MethodService();
    echo json_encode($service->GetAllShippingMethod());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get All payment method
$app->get('/api/payment', function ($request, $response, $args) {
    $service = new MethodService();
    echo json_encode($service->GetAllPaymentMethod());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get single shipping method
$app->get('/api/shipping/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new MethodService();
    echo json_encode($service->GetSingleShippingMethod($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get single payment method
$app->get('/api/payment/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new MethodService();
    echo json_encode($service->GetSinglePaymentMethod($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// change status shipping method
$app->put('/api/shipping/update-status/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $status = $request->getParam('status');
    $service = new MethodService();
    echo json_encode($service->UpdateStatusShippingMethod($id,$status));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// change status payment method
$app->put('/api/payment/update-status/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $status = $request->getParam('status');
    $service = new MethodService();
    echo json_encode($service->UpdateStatusPaymentMethod($id,$status));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
?>