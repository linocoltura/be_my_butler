<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");

$user = new User;
$service = new Service;
$user->setId($_SESSION['userData']['id']);
$currentService = $user->getService();

$service->setServiceID($currentService['serviceID']);
$service->setStatus($currentService['status']);
$service->setAmount($currentService['amount']);
$service->setCompleted($currentService['completed']);

$customers = $service->getCustomers();

$i = 0;

foreach ($customers as $customer){

    $currentCustomer = new User;
    $currentCustomer->setId($customer['id']);
    $userIsCustomerData = $currentCustomer->getAsCustomer($service->getServiceID());
    $currentUser = $currentCustomer->getUserById($customer['userID']);


    $customers[$i]['customerName'] = $currentUser['first_name'];
    $customers[$i]['customerPicture'] = $currentUser['picture'];

    $i++;
}

$feedback = [
    "code" => 200,
    "customers" => $customers
];


echo json_encode($feedback);