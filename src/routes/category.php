<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/models/categoryModel.php';
require '../src/services/categoryService.php';
// $app = new \Slim\App;


//Get All Categories
$app->get('/api/categories', function ($request, $response, $args) {
    $model = new CategoryModel();
    echo json_encode($model->GetAll());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Category
$app->get('/api/categories/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $model = new CategoryModel();
    echo json_encode($model->GetSingle($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//get categories by brand
// $app->get('/api/categories/brand/{id}', function ($request, $response, $args) {
//     $id = $request->getAttribute('id');
//     $model = new CategoryModel();
//     echo json_encode($model->GetCategoriesByBrand($id));
//     return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
// });

//add category
$app->post('/api/categories/add', function ($request, $response, $args) {
    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $description    = $request->getParam('description');
    $parentCategory = $request->getParam('parentcategory');
    $brand          = $request->getParam('brand');
    $count          = $request->getParam('count');

    $model          = new CategoryModel();
    echo json_encode($model->Add($name,$image,$description,$parentCategory,$brand,$count));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update category
$app->put('/api/categories/update/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');
    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $description    = $request->getParam('description');
    $parentCategory = $request->getParam('parentcategory');
    $count          = $request->getParam('count');

    $model = new CategoryModel();
    echo json_encode($model->Update($id,$name,$image,$description,$parentCategory,$brand,$count));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete category
$app->delete('/api/categories/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $model = new CategoryModel();
    echo json_encode($model->Delete($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});