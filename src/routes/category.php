<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/categoryService.php';
// $app = new \Slim\App;


//Get All Categories
$app->get('/api/categories', function ($request, $response, $args) {
    $service = new CategoryService();
    echo json_encode($service->GetAllCategory());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Category
$app->get('/api/categories/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new CategoryService();
    echo json_encode($service->GetSingleCategory($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});


//add category
$app->post('/api/categories/add', function ($request, $response, $args) {
    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $description    = $request->getParam('description');
    $parentCategory = $request->getParam('parentcategory');
    $count          = $request->getParam('count');

    $service          = new CategoryService();
    echo json_encode($service->InsertCategory($name,$image,$description,$parentCategory,$count));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update category
$app->put('/api/categories/update/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');
    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $description    = $request->getParam('description');
    $parentCategory = $request->getParam('parentcategory');
    //$count          = $request->getParam('count');

    $service = new CategoryService();
    echo json_encode($service->UpdateCategory($id,$name,$image,$description,$parentCategory));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update count category
$app->put('/api/categories/update-count/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');
    $count = $request->getParam('count');

    $service = new CategoryService();
    echo json_encode($service->UpdateCountCategory($id, $count));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete category
$app->delete('/api/categories/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $service = new CategoryService();
    echo json_encode($service->DeleteCategory($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});