<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Db.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

if ($user->isButler()){
    header("location:butlerdeliver.php");
}

if (!$user->isCustomer()){
    header("location:mode.php");
}

$myService = $user->getServiceAsCustomer();
$tempId = $user->getButlerUserIdAsCustomer();
$myButler = $user->getUserById($tempId);



?>

<!doctype HTML>
<html>
<?php include 'includes/header.php' ?>
<body>
  <header>
      <nav class="nav navbar-default">

      </nav>

  </header>
  <div class="container-fluid">
      <div class="container bg-overlay">
          <div class="header">

            <h1 class="headerTitle"style="text-align: left; padding-left:10%;">Uw bestelling:</h1>
            <img src="img/running.svg" alt="Butler Running" class="header-svg" style="height: 80px; margin-left: 70%;">
          </div>

          <div class="pending">

              <img class="userAvatar2"src="<?php echo $myButler['picture'] ?>" alt="butler">
                  <p class="userName2">Uw butler: <?php echo $myButler['first_name'] ?></p>
<!--                      <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>-->
                        <p id="butlerStatus">
                            <?php
                                if ($myService['status'] == 1){
                                    echo 'neemt bestellingen op';
                                }elseif($myService['status'] == 2){
                                    echo'is aan de bar';
                                }else echo'is onderweg';
                            ?>
                        </p>
<!--                      <div class="trackNtrace" style="margin-top: 35%;margin-left: 15%;margin-right: 15%;">-->
<!---->
<!--                        <button type="button" class="btn btn-secondary btn-circle" style="background-color:#D64842;" ><i class="glyphicon glyphicon-record" ></i></button>-->
<!---->
<!--                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record" ></i></button>-->
<!---->
<!--                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record"></i></button>-->
<!---->
<!--                      </div>-->


              </div>
<!--              <div class="chat">-->
<!--                <textarea class="form-control" id="exampleTextarea" rows="3" style="margin-top:78%;"></textarea>-->
<!--                <button type="button" class="btn btn-success" style="width: 80px;margin-top: -29%;margin-left:75%;">Verstuur</button>-->
<!--              </div>-->

          <img src="img/qrcode.jpg" alt="" id="confirm">

          </div>


      </div>

  <script type="text/javascript" src="js/getStatus.js"></script>

</body>
</html>
