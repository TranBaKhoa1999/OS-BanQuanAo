<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/statisticalService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/statistical', function ($request, $response, $args) {
    $service = new StatisticalService();
    echo json_encode($service->GetAllStatistical());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
$app->get('/api/statistical/{id_product}', function ($request, $response, $args) {
    $id_product = $request ->getAttribute('id_product');
    $service = new StatisticalService();
    echo json_encode($service->GetSingleStatistical($id_product));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update view
$app->put('/api/statistical/update-view/{id_product}', function ($request, $response, $args) {
    $id_product = $request ->getAttribute('id_product');
    $service = new StatisticalService();
    echo json_encode($service->UpdateView($id_product));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
?>