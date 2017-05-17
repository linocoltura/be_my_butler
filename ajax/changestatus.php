<?php
header('Content-Type: application/json');
session_start();

include_once("classes/Service.class.php");
include_once("classes/User.class.php");

$user = new User;
$service = new Service;
$user->setId($_SESSION['userData']['id']);

if ($currentService = $user->getService()) {

    $service->setServiceID($currentService['serviceID']);
    $service->setStatus($currentService['status']);
    $service->setAmount($currentService['amount']);
    $service->setCompleted($currentService['completed']);

}

if ($service->getStatus() == 1){
    $service->setStatus(2);
    $feedback = [
        "code" => 200,
        "status" => 2
    ];
}

if ($service->getStatus() == 2){
    $service->setStatus(3);
    $feedback = [
        "code" => 200,
        "status" => 3
    ];
}

try {
    if ($post->changeDescription()) {
        $feedback = [
            "code" => 200,
            "1" => $post->getUserID(),
            "2" => $_POST['newDescription'],
            "3" => $post->getPostDescription()
        ];
    }
} catch (Exception $e) {
    $feedback = [
        "code" => 500,
        "message" => $e->getMessage()
    ];
}


echo json_encode($feedback);

