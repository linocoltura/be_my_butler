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
    <div class="header">
      <h1>Header</h1>
    </div>

      <div class="tutorial-video">
          <video src="" autoplay poster="">
          </video>
        </div>
    <div class="butlerOverview">
      <form class="form-group" action="" method="post">
          <label for="amount">Ik kan nog ...</label>
          <select class="form-control" id="amount" name="amount">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
          </select>
          <label for="amount">consumptie(s) meedragen</label>
          <button type="submit" class="btn btn-secondary btn-lg">Bevestig</button>
      </form>
    </div>
          <div class="loyalOverview">
            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span><h5>Aantal Bedieningen</h5>
            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span><h5>Aantal Favorites</h5>
            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span></span><h5>Loyaliteits Punten</h5>
          </div>


  </div>



</div>


</body>
</html>
