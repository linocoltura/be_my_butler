<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

$service = new Service;

$currentService = $user->getService();

    $service->setServiceID($currentService['serviceID']);
    $service->setStatus($currentService['status']);
    $service->setAmount($currentService['amount']);
    $service->setCompleted($currentService['completed']);


if ($service->getStatus() == 1){
    $service->setStatus(2);
    $feedback = [
        "code" => 200,
        "status" => 2,
        "debug" => $service->updateService()
    ];
    $service->updateService();
} else if ($service->getStatus() == 2){
    $service->setStatus(3);
    $feedback = [
        "code" => 200,
        "status" => 3,
    ];
    $service->updateService();
}


//$feedback['debug2'] = $service->saveService();


echo json_encode($feedback);

