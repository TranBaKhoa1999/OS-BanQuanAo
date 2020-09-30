<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/billingService.php';
// $app = new \Slim\App;


//Get All brand
$app->get('/api/bills', function ($request, $response, $args) {
    $service = new BillingService();
    echo json_encode($service->GetAllBills());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single brand
$app->get('/api/bills/{id}', function ($request, $response, $args) {
    $id = $request->getAttribute('id');
    $service = new BillingService();
    echo json_encode($service->GetSingleBill($id));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
//admin add new bill
$app->post('/api/bills/addbyadmin', function ($request, $response, $args) {
    // thong tin khach hang
    $email           = $request->getParam('email');
    $name           = $request->getParam('name');
    $phone           = $request->getParam('phone');
    $district           = $request->getParam('district');
    $city           = $request->getParam('city');
    $address           = $request->getParam('address');

    // thong tin bill

    $payment_method           = $request->getParam('payment_method');
    $shipping_method           = $request->getParam('shipping_method');
    // $total           = $request->getParam('name'); // auto 0
    // $date           = $request->getParam('date');
    // $status           = $request->getParam('name'); // auto 'Set up'

    $service = new BillingService();
    echo json_encode($service->SetupNewBill($email,$name,$phone,$city,$district,$address,$payment_method,$shipping_method,1));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//change status bill
$app->put('/api/bills/update-status/{id}/{status}', function ($request, $response, $args) {
    $id_billing = $request->getAttribute('id');
    $status = $request->getAttribute('status');
    $service = new BillingService();
    echo json_encode($service->ChangeStatusBill($id_billing,$status));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

/// ----------------------------------- Bill Detail ----------------------
// insert product to bill (only bill type : Set up)
$app->post('/api/bills/addproduct', function ($request, $response, $args) {
    $id_billing =  $request->getParam('id_billing');
    $id_product =  $request->getParam('id_product');
    $count =  $request->getParam('count');
    $service = new BillingService();
    echo json_encode($service->InsertBillDetail($id_billing,$id_product,$count) );
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
// delete product in bill
$app->delete('/api/bills/deleteproduct/{id_billing}/{id_product}', function ($request, $response, $args) {
    $id_billing =  $request->getAttribute('id_billing');
    $id_product =  $request->getAttribute('id_product');
    $service = new BillingService();
    echo json_encode($service->DeleteProductInBill($id_billing,$id_product) );
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

$app->post('/api/bills/addbyshop', function ($request, $response, $args) {
    // thong tin khach hang
    $email           = $request->getParam('email');
    $name           = $request->getParam('name');
    $phone           = $request->getParam('phone');
    $district           = $request->getParam('district');
    $city           = $request->getParam('city');
    $address           = $request->getParam('address');

    // thong tin bill

    $payment_method           = $request->getParam('payment_method');
    $shipping_method           = $request->getParam('shipping_method');
    
    $array_products = $request->getParam('array_products');
    // $total           = $request->getParam('name'); // auto 0
    // $date           = $request->getParam('date');
    // $status           = $request->getParam('name'); // auto 'Set up'

    $service = new BillingService();
    echo json_encode($service->InsertNewBill($email,$name,$phone,$city,$district,$address,$payment_method,$shipping_method,$array_products));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});
?>