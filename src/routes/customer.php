<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';
require '../src/services/customerService.php';
// $app = new \Slim\App;


//Get All customer
$app->get('/api/customers', function ($request, $response, $args) {
    $service = new CustomerService();
    echo json_encode($service->GetAllCustomers());
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//Get Single customer
$app->get('/api/customers/{email}', function ($request, $response, $args) {
    $email = $request->getAttribute('email');
    $service = new CustomerService();
    echo json_encode($service->GetSingleCustomer($email));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//add customer
$app->post('/api/customers/add', function ($request, $response, $args) {
    
    $email              = $request->getParam('email');
    $name               = $request->getParam('name');
    $phone              = $request->getParam('phone');
    $city               = $request->getParam('city');
    $district           = $request->getParam('district');
    $address            = $request->getParam('address');
    
    $service = new CustomerService();
    echo json_encode($service->Insertcustomer($email,$name,$phone,$city,$district,$address));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update customer
$app->put('/api/customers/update/{email}', function ($request, $response, $args) {
    $email              = $request->getParam('email');
    $name               = $request->getParam('name');
    $phone              = $request->getParam('phone');
    $city               = $request->getParam('city');
    $district           =$request->getParam('district');
    $address            = $request->getParam('address');

    $service = new CustomerService();
    echo json_encode($service->Updatecustomer($email,$name,$phone,$country,$city,$address));
    
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});


?>