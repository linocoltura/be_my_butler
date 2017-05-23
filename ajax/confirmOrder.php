<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/User.class.php");
include_once("../classes/Db.class.php");


if (!empty($_POST) && isset($_POST['userID'])){


    $user = new User;
    $user->setId($_SESSION['userData']['id']);

    $service = new Service;
    $currentService = $user->getService();

    $service->setServiceID($currentService['serviceID']);
    $service->setStatus($currentService['status']);
    $service->setAmount($currentService['amount']);
    $service->setCompleted($currentService['completed']);

    $userID = $_POST['userID'];
    $service->updateCompleted($userID);
    $userIDfb = $userID;


    if ($service->hasCustomers()){
        $final = false;
    } else {
        $final = true;
        $service->updateFinal();
    }

    $feedback = [
        "code" => 200,
        "userIDfb" => $userIDfb,
        "final" => $final
    ];

}

echo json_encode($feedback);