<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);



if ($user->isCustomer()){
    header("location:customerpending.php");
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
        <img src="img/qr_red.svg" class="qr-red" alt="QR Code Not Ready">
        <button type="button" class="btn btn-success" name="button">Aan de bar</button>
        <span class="infoStatus">Geen nieuwe bestellingen</span>
    </div>
</div>


</div>

<script type="text/javascript" src="js/checkCustomers.js"></script>
</body>
</html>
