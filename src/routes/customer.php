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
    $name           = $request->getParam('name');
    $logo           = $request->getParam('logo');
    $description    = $request->getParam('description');
    
    $service = new CustomerService();
    echo json_encode($service->Insertcustomer($name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

// update customer
$app->put('/api/customers/update/{id}', function ($request, $response, $args) {

    $id     = $request->getAttribute('id');
    $name   = $request->getParam('name');
    $logo   = $request->getParam('logo');
    $description = $request->getParam('description');

    $service = new CustomerService();
    echo json_encode($service->Updatecustomer($id,$name,$logo,$description));
    return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
});

//delete customer
// $app->delete('/api/customers/delete/{id}', function ($request, $response, $args) {

//     $id = $request->getAttribute('id');

//     $service = new CustomerService();
//     echo json_encode($service->Delete($id));
//     return $response->withHeader('Content-type', 'application/json;charset=UTF-8');
// });

?>