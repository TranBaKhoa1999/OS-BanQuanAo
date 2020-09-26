<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/brandService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/brands', function ($request, $response, $args) {
    $service = new BrandService();
    echo json_encode($service->GetAllBrands());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single brand
$app->get('/api/brands/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new BrandService();
    echo json_encode($service->GetSingleBrand($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//add brand
$app->post('/api/brands/add', function ($request, $response, $args) {
    $name           = $request->getParam('name');
    $logo           = $request->getParam('logo');
    $description    = $request->getParam('description');
    
    $service = new BrandService();
    echo json_encode($service->InsertBrand($name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update brand
$app->put('/api/brands/update/{id}', function ($request, $response, $args) {

    $id     = $request->getAttribute('id');
    $name   = $request->getParam('name');
    $logo   = $request->getParam('logo');
    $description = $request->getParam('description');

    $service = new BrandService();
    echo json_encode($service->UpdateBrand($id,$name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// delete brand
$app->delete('/api/brands/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $service = new BrandService();
    echo json_encode($service->DeleteBrand($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>