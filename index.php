<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

if ($user->isButler()){
    header("location:butlerdeliver.php");
}
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
    <link rel="stylesheet" href="css/animate.css" />

    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="nav navbar-default">
        <div class="container">

        </div>
    </nav>

</header>
<div class="container-fluid">
<div class="container bg-overlay">

    <img src="<?php echo $_SESSION['userData']['picture'] ?>" alt="fbAvatar" class="fbAvatar animated bounceInLeft">
    <h1 class="animated bounceInDown"><?php echo "Hello ". $_SESSION['userData']['first_name'] ?></h1>
    <h3>Scan uw ticket om uw registratie te voltooien</h3>

    <!-- <input type="file" accept="image/*" capture="camera"> -->
    <a href="cashlessconnect.php"><button id="cameraButton" type="button" class="btn btn-default btn-circle btn-xl animated infinite tada"><i class="glyphicon glyphicon-camera"></i></button></a>

</div>
</div>


</body>
</html>
