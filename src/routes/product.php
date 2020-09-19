<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';

require '../src/services/productService.php';

//Get All Product
$app->get('/api/products', function ($request, $response, $args) {
    $service = new ProductService();
    echo json_encode($service->GetAllProducts());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single Product
$app->get('/api/products/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new ProductService();
    echo json_encode($service->GetSingleProduct($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// get all Products by category
$app->get('/api/products/cate/{id_Cate}', function ($request, $response, $args) {
    $id = $request->getAttribute('id_Cate');
    $service = new ProductService();
    echo json_encode($service->GetAllProductsByCate($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
//sort
// $app->get('/api/products/sort/cate={id}&type={type}', function ($request, $response, $args) {
//     $idCate = $request->getAttribute('id');
//     $type = $request->getAttribute('type');
//     $model = new ProductModel();
//     if($type == "null"){ // sort by cate
//         $model->SortByCate($idCate);
//     }
//     else if($idCate== "null"){ // sort by cost
//         $model->SortByCost($type);
//     }
//     else{ // sort by cost and cate
//         $model->SortAll($idCate,$type);
//     }
//     return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
// });

// add product
$app->post('/api/products/add', function ($request, $response, $args) {

    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $brand          = $request->getParam('brand');
    $sku            = $request->getParam('sku');
    $attribute      = $request->getParam('attribute');
    $price          = $request->getParam('price');
    $sale_price     = $request->getParam('sale_price');
    $description    = $request->getParam('description');
    $visibility     = $request->getParam('visibility');
    $date           = $request->getParam('date');

    $service = new ProductService();
    echo json_encode($service->InsertProduct($name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
$app->post('/api/products/addcate', function ($request, $response, $args) {

    $id_cate           = $request->getParam('id_Category');
    $id_product          = $request->getParam('id_Product');


    $service = new ProductService();
    echo json_encode($service->InsertProduct_cate($id_cate,$id_product));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
//update product
$app->put('/api/products/update/{id}', function ($request, $response, $args) {

    $id     = $request->getAttribute('id');
    $name           = $request->getParam('name');
    $image          = $request->getParam('image');
    $brand          = $request->getParam('brand');
    $sku            = $request->getParam('sku');
    $attribute      = $request->getParam('attribute');
    $price          = $request->getParam('price');
    $sale_price     = $request->getParam('sale_price');
    $description    = $request->getParam('description');
    $visibility     = $request->getParam('visibility');
    $date           = $request->getParam('date');

    $service = new ProductService();
    echo json_encode($service->UpdateProduct($id,$name,$image,$brand,$sku,$attribute,$price,$sale_price,$description,$visibility,$date));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete product
$app->delete('/api/products/delete/{id}', function ($request, $response, $args) {

    $id = $request->getAttribute('id');

    $service = new ProductService();
    echo json_encode($service->Delete($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

?>