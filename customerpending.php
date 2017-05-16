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

      </nav>

  </header>
  <div class="container-fluid">
      <div class="container bg-overlay">
          <div class="header">

          <h1>Header</h1>
          </div>

          <div class="orderOverview">

              <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="Avatar" style="width:50px;">
                  <p class="userName">Mike Matthews</p>
                      <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <label for="butlerStatus" style="    margin-top: 6%;margin-left: 40%;">Butler is onderweg</label>
                      <div class="trackNtrace" style="margin-top: 13%;margin-left: 12%;margin-right: 12%;">

                        <button type="button" class="btn btn-danger btn-circle" ><i class="glyphicon glyphicon-record" ></i></button>

                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record" ></i></button>

                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record"></i></button>

                      </div>


              </div>
              <div class="chat">
                <textarea class="form-control" id="exampleTextarea" rows="3" style="margin-top:78%;"></textarea>
                <button type="button" class="btn btn-success" style="width: 80px;margin-top: -29%;margin-left:75%;">Verstuur</button>
              </div>


          </div>


      </div>


</body>
</html>
