<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/models/brandModel.php';
// $app = new \Slim\App;


//Get All Categories
$app->get('/api/brands', function ($request, $response, $args) {
    $model = new BrandModel();
    $model->GetAll();
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Category
$app->get('/api/brands/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $model = new BrandModel();
    $model->GetSingle($id);
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>