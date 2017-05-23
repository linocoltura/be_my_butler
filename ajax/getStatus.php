<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

$myService = $user->getServiceAsCustomer();

$feedback = [
    "code" => 200,
    "debug" => $myService['status'],
];


if ($myService['status'] == 1){
    $feedback = [
        "code" => 200,
        "status" => 1,
    ];
} else if ($myService['status'] == 2){
    $feedback = [
        "code" => 200,
        "status" => 2,
    ];
} else if ($myService['status'] == 3){
    $feedback = [
        "code" => 200,
        "status" => 3,
    ];
}


echo json_encode($feedback);

