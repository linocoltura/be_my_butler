<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

if ($user->isFinal()){
    $final = true;
} else $final = false;

$myService = $user->getServiceAsCustomer();

$feedback = [
    "code" => 200,
    "final" => $final
];


if ($myService['status'] == 1){
    $feedback = [
        "code" => 200,
        "status" => 1,
        "final" => $final
    ];
} else if ($myService['status'] == 2){
    $feedback = [
        "code" => 200,
        "status" => 2,
        "final" => $final
    ];
} else if ($myService['status'] == 3){
    $feedback = [
        "code" => 200,
        "status" => 3,
        "final" => $final
    ];
}


echo json_encode($feedback);

