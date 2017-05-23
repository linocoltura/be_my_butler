<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Service.class.php");
include_once("classes/Db.class.php");

$user = new User;
$service = new Service;
$user->setId($_SESSION['userData']['id']);

if ($user->isCustomer()){
    header("location:customerpending.php");
}

if (!$user->isButler()){
    header("location:mode.php");
}

$currentService = $user->getService();

$service->setServiceID($currentService['serviceID']);
$service->setStatus($currentService['status']);
$service->setAmount($currentService['amount']);
$service->setCompleted($currentService['completed']);


$customers = $service->getCustomers();

?>

<!doctype HTML>
<html>
<head>
  <?php include 'includes/header.php' ?>

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

    <h1 class="headerTitle"style="text-align: center; padding-left:0;">Overzicht</h1>
    <img src="img/Mode_Butler.svg" alt="Butler Waiting" class="header-svg" style="margin-left:68%;">
    </div>

    <div id="customers">
    <?php if ($service->hasCustomers()): ?>

    <?php foreach ($customers as $customer): ?>
    <?php
        $currentCustomer = new User;
        $currentCustomer->setId($customer['id']);
        $userIsCustomerData = $currentCustomer->getAsCustomer($service->getServiceID());
        $currentUser = $currentCustomer->getUserById($customer['userID']);

    ?>
    <div class="orderOverview" id="<?php echo $customer['userID'] ?>">

        <img class="userAvatar"src="<?php echo $currentUser['picture']?>" alt="Avatar">
        <p class="userName"><?php echo $currentUser['first_name']?></p>
        <p class="orderStatus <?php echo ($customer['complete']) ? 'green' : 'orange';?>"><?php echo ($userIsCustomerData['complete'] == true) ? 'Voltooid' : 'Actief';?></p>
        <div class="drinkOrder">
            <img src="img/drinkIcon.svg" alt="">
            <?php echo $customer['drink']?>
        </div>

        <img src="img/qr_red.svg" class="qr-red qr" alt="QR Code Not Ready" data-toggle="modal" data-target="#popupmodal">

        <div class="location"><img src="img/location.svg" alt="location">tribune 1 plaats 7</div>

    </div>
    </div>
    <?php endforeach; ?>
</div>
    <?php else: ?>
        <div id="emptyState">
            <p class="p-emptystate">Nog geen bestellingen</p>
            <img src="img/EmptyStatePullDown.svg" alt="Empty State Bell" class="svg-emptystate animated infinite bounce">
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content camera">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Scan de QR code om te bevestigen</h4>
                </div>
                <div class="modal-body">

                    <div class="videoContainer">
                        <video autoplay="true" id="videoElement"></video>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">Bevestig</button>
                </div>
            </div>
        </div>
    </div>

    <span id="clickedOrder" style="display: none;"></span>

    <div class="infoNotice">
        <button id="statusButton" type="button" class="btn btn-success" name="button">Aan de bar</button>
        <span class="infoStatus">Geen nieuwe bestellingen meer toelaten</span>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/updateCustomers.js"></script>
<script type="text/javascript" src="js/changeStatus.js"></script>
</body>
</html>
