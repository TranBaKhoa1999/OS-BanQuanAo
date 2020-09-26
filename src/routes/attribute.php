<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/attributeService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/attributes', function ($request, $response, $args) {
    $service = new AttributeService();
    echo json_encode($service->GetAllAttributes() );
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single brand
$app->get('/api/attributes/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new AttributeService();
    echo json_encode($service->GetSingleAttribute($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
//add brand
$app->post('/api/attributes/add', function ($request, $response, $args) {
    $name           = $request->getParam('name');
    $logo           = $request->getParam('logo');
    $description    = $request->getParam('description');
    $service = new AttributeService();
    echo json_encode($service->AddAttribute($name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update brand
$app->put('/api/attributes/update/{id}', function ($request, $response, $args) {

    $id     = $request->getAttribute('id');
    $name   = $request->getParam('name');
    $logo   = $request->getParam('logo');
    $description = $request->getParam('description');

    $service = new AttributeService();
    echo json_encode($service->UpdateAttribute($id,$name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete brand
$app->delete('/api/attributes/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $service = new AttributeService();
    echo json_encode($service->DeleteAttribute($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>