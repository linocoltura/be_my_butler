<?php

include_once("includes/facebooksession.php");
include_once("classes/Drink.class.php");
include_once("classes/User.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

if ($user->isButler()){
    header("location:butlerdeliver.php");
}
if ($user->isCustomer()){
    header("location:customerpending.php");
}


    $drink = new Drink();
    $drinks = $drink->getAllDrinks();

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

    </nav>

</header>
<div class="container-fluid">
    <div class="container bg-overlay">
        <div class="header">

        <h1>Header</h1>
        </div>

        <div class="orderOverview">

            <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="Avatar">
                <p class="userName">Mike Matthews</p>
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
            <div class="inlineBeerSpots">
                <img src="img/pint.svg" alt="Full Pint" class="beerSpots animated infinite pulse">
                    <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">
                        <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">




            </div>



        </div>


    </div>



    <div class="test">
        <?php foreach ($drinks as $drink): ?>
            <p><?php echo $drink['name'] ?></p>
        <?php endforeach; ?>
    </div>

</div>


</body>
</html>
