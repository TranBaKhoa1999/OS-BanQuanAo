<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/models/productModel.php';
// $app = new \Slim\App;


//Get All Product
$app->get('/api/products', function ($request, $response, $args) {
    $model = new ProductModel();
    $model->GetAll();
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Product
$app->get('/api/products/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $model = new ProductModel();
    $model->GetSingle($id);
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//sort
$app->get('/api/products/sort/cate={id}&type={type}', function ($request, $response, $args) {
    $idCate = $request->getAttribute('id');
    $type = $request->getAttribute('type');
    $model = new ProductModel();
    if($type == "null"){ // sort by cate
        $model->SortByCate($idCate);
    }
    else if($idCate== "null"){ // sort by cost
        $model->SortByCost($type);
    }
    else{ // sort by cost and cate
        $model->SortAll($idCate,$type);
    }
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>