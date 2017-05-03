<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Db.class.php");


if (!empty($_POST) && isset($_POST['amount'])){
    $user = new User();
    $user->setId($_SESSION['userData']['id']);
    if ($user->setBalance($_POST['amount'])){
        header("location:mode.php");
    }
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
    <link rel="stylesheet" href="css/animate.css">

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
        <h3 class="animated bounceInDown">Stel een bedrag in:</h3>

        <form class="form-group" action="" method="post">
            <label for="amount" class="animated bounceInLeft">KVM Betaalkaart bedraagt:</label>
            <select class="form-control" id="amount" name="amount">
                <option value="10">€ 10.00</option>
                <option value="20">€ 20.00</option>
                <option value="40">€ 40.00</option>
                <option value="50">€ 50.00</option>
            </select>
            <button id="syncButton" type="submit" class="btn btn-default btn-circle btn-xl animated infinite tada"><i class="glyphicon glyphicon-refresh"></i></button>
        </form>
    </div>


</div>


</body>
</html>
