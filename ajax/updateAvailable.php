<?php
header('Content-Type: application/json');
session_start();

include_once("../classes/Service.class.php");
include_once("../classes/Db.class.php");



if (!empty($_POST['serviceids'])) {

    $serviceIDs = $_POST['serviceids'];

    $services = [];

    foreach ($serviceIDs as $s){
        $service = new Service();
        $service->setServiceID($s);
        $amount = $service->getAmountFromDb();
        $service->setAmount($amount['amount']);
        $available = $service->getAvailableConsumptions();
        $claimed = $service->getClaimedConsumptions();
        $thisReturn = [
            'serviceid' => $s,
            'available' => $available,
            'claimed' => $claimed
        ];
        array_push($services,$thisReturn);
    };

    $feedback = [
        "code" => 200,
        "services" => $services
    ];


    echo json_encode($feedback);
}
