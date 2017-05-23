<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");

$service = new Service();
$services = $service->getServices();
$i = 0;

foreach ($services as $service){

    $serviceUser = new User();
    $activeServiceUser = $serviceUser->getUserById($service['userID']);

    $services[$i]['butlerName'] = $activeServiceUser['first_name'];
    $services[$i]['butlerPicture'] = $activeServiceUser['picture'];

    $i++;
}

$feedback = [
    "code" => 200,
    "services" => $services
];


echo json_encode($feedback);