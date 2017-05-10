<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Service.class.php");

$user = new User;
$service = new Service;
$user->setId($_SESSION['userData']['id']);

if ($user->isCustomer()){
    header("location:customerpending.php");
}

if ($currentService = $user->getService() && $service->hasCustomers()) {

    $service->setServiceID($currentService['serviceID']);
    $service->setStatus($currentService['status']);
    $service->setAmount($currentService['amount']);
    $service->setCompleted($currentService['completed']);

    $customers = $service->getCustomers();
}

?>

<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/screen.css">

    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="nav navbar-default">
        <div class="container">
            <a href="index.php"><div class="logo"></div></a>


        </div>
    </nav>


</header>
<div class="container-fluid">
<div class="container bg-overlay" style="overflow-y: scroll;">

    <div class="header">
    <a href="mode.php"><span class="glyphicon glyphicon-menu-left"></span></a>
    <h1>Header</h1>
    </div>

    <div class="orderOverview" id="23">

        <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/adhamdannaway/128.jpg" alt="Avatar">
        <p class="userName">Jayden Davis</p>
        <p class="orderStatus">Delivered</p>

        <img src="img/qr_red.svg" class="qr-red qr" alt="QR Code Not Ready" data-toggle="modal" data-target="#exampleModalLong">

    </div>

    <?php if ($service->hasCustomers()): ?>

    <?php foreach ($customers as $customer): ?>
    <?php
        $currentCustomer = new User;
        $currentCustomer->setId($customer['id']);
        $userIsCustomerData = $currentCustomer->getAsCustomer($service['serviceID']);
    ?>
    <div class="orderOverview" id="<?php echo $userIsCustomerData['id'] ?>">

        <img class="userAvatar"src="<?php echo $customer['picture']?>" alt="Avatar">
        <p class="userName"><?php echo $customer['first_name']?></p>
        <p class="orderStatus ><?php echo ($userIsCustomerData['complete'] == true) ? 'green' : 'orange';?>"><?php echo ($userIsCustomerData['complete'] == true) ? 'Voltooid' : 'Actief';?></p>
        <p class="order><?php echo $userIsCustomerData['drink']?>"><?php echo ($userIsCustomerData['complete'] == true) ? 'Voltooid' : 'Actief';?></p>

        <img src="img/qr_red.svg" class="qr-red qr" alt="QR Code Not Ready" data-toggle="modal" data-target="#exampleModalLong">

    </div>

    <?php endforeach; ?>

    <?php else: ?>
        <p>Nog geen bestellingen</p>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content camera">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Scan uw QR code</h4>
                </div>
                <div class="modal-body">

                    <div class="videoContainer">
                        <video autoplay="true" id="videoElement"></video>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-secondary" data-dismiss="modal">Bevestig</button>
                </div>
            </div>
        </div>
    </div>

    <span id="clickedOrder" style="display: none;"></span>

    <div class="infoNotice">
        <button type="button" class="btn btn-success" name="button">Aan de bar</button>
        <span class="infoStatus">Geen nieuwe bestellingen meer toelaten</span>
    </div>
  </div>
</div>






<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/checkCustomers.js"></script>
</body>
</html>
