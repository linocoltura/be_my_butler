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
<div class="container bg-overlay">

    <div class="header">
    <a href="mode.php"><span class="glyphicon glyphicon-menu-left"></span></a>
    <h1>Header</h1>
    </div>

    <div class="orderOverview">

        <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/adhamdannaway/128.jpg" alt="Avatar">
        <p class="userName">Jayden Davis</p>
        <p class="orderStatus">Delivered</p>

        <img src="img/qr_red.svg" class="qr-red" alt="QR Code Not Ready" data-toggle="modal" data-target="#exampleModalLong">

    </div>

    <?php if ($service->hasCustomers()): ?>

    <?php foreach ($customers as $customer): ?>



    <div class="orderOverview">

        <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/adhamdannaway/128.jpg" alt="Avatar">
        <p class="userName">Jayden Davis</p>
        <p class="orderStatus">Delivered</p>

        <img src="img/qr_red.svg" class="qr-red" alt="QR Code Not Ready" data-toggle="modal" data-target="#exampleModalLong">

    </div>

    <?php endforeach; ?>

    <?php else: ?>
        <p>Nog geen bestellingen</p>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="infoNotice">
        <button type="button" class="btn btn-success" name="button">Aan de bar</button>
        <span class="infoStatus">Geen nieuwe bestellingen meer toelaten</span>
    </div>
  </div>
</div>







<script type="text/javascript" src="js/checkCustomers.js"></script>
</body>
</html>
