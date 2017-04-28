<?php

include_once("includes/facebooksession.php");

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

        <div class="form-group">
  <label for="sel1" class="animated bounceInLeft">KVM Betaalkaart bedraagt:</label>
  <select class="form-control" id="sel1">
    <option>€ 10.00</option>
    <option>€ 20.00</option>
    <option>€ 40.00</option>
    <option>€ 50.00</option>
  </select>
</div>
        <a href="mode.php"><button id="syncButton" type="button" class="btn btn-default btn-circle btn-xl animated infinite tada"><i class="glyphicon glyphicon-refresh"></i></button></a>
    </div>


</div>


</body>
</html>
