<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Get All brand
$app->get('/api', function ($request, $response, $args) {
    //$service = new AttributeService();
    //echo json_encode($service->GetAllAttributes() );
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>