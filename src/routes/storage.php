<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/storageService.php';
// $app = new \Slim\App;


//Get All Categories
$app->get('/api/storage', function ($request, $response, $args) {
    $service = new StorageService();
    echo json_encode($service->GetAllStorage());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Storage
$app->get('/api/storage/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new StorageService();
    echo json_encode($service->GetSingleStorage($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});


//add Storage
$app->post('/api/storage/add', function ($request, $response, $args) {

    $id_Product = $request->getParam('id_product');
    $price_In = $request->getParam('price_in');
    $count = $request->getParam('count');
    $stock = $request->getParam('stock');

    $service          = new StorageService();
    echo json_encode($service->InsertStorage($id_Product, $price_In, $count, $stock));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update Storage
$app->put('/api/storage/update/{id}', function ($request, $response, $args) {

    $id_Product = $request->getParam('id_product');
    $price_In = $request->getParam('price_in');
    $count = $request->getParam('count');
    $stock = $request->getParam('stock');

    $service = new StorageService();
    echo json_encode($service->UpdateStorage($id_Product, $price_In, $count, $stock));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// //delete Storage
// $app->delete('/api/storage/delete/{id}', function ($request, $response, $args) {

//     $id = $request->getAttribute('id');

//     $service = new StorageService();
//     echo json_encode($service->DeleteStorage($id));
//     return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
// });