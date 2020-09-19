<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/models/brandModel.php';
require '../src/services/brandService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/brands', function ($request, $response, $args) {
    $model = new BrandModel();
    echo json_encode($model->GetAll());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single brand
$app->get('/api/brands/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $model = new BrandModel();
    echo json_encode($model->GetSingle($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
//add brand
$app->post('/api/brands/add', function ($request, $response, $args) {
    $name           = $request->getParam('name');
    $logo           = $request->getParam('logo');
    $description    = $request->getParam('description');
    
    $model = new BrandModel();
    echo json_encode($model->Add($name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update brand
$app->put('/api/brands/update/{id}', function ($request, $response, $args) {

    $id     = $request->getAttribute('id');
    $name   = $request->getParam('name');
    $logo   = $request->getParam('logo');
    $description = $request->getParam('description');

    $model = new BrandModel();
    echo json_encode($model->Update($id,$name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete brand
$app->delete('/api/brands/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $model = new BrandModel();
    echo json_encode($model->Delete($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>