<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

if ($user->isButler()){
    header("location:butlerdeliver.php");
}

$myService = $user->getService();
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

          <h1>Header</h1>
          </div>

          <div class="orderOverview">

              <img class="userAvatar"src="<?php echo $myButler['picture'] ?>" alt="butler" style="width:50px;">
                  <p class="userName"><?php echo $myButler['first_name'] ?></p>
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
                      <div class="trackNtrace" style="margin-top: 13%;margin-left: 12%;margin-right: 12%;">

                        <button type="button" class="btn btn-danger btn-circle" ><i class="glyphicon glyphicon-record" ></i></button>

                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record" ></i></button>

                        <button type="button" class="btn btn-secondary btn-circle" style="margin-left: 33%;"><i class="glyphicon glyphicon-record"></i></button>

                      </div>


              </div>
<!--              <div class="chat">-->
<!--                <textarea class="form-control" id="exampleTextarea" rows="3" style="margin-top:78%;"></textarea>-->
<!--                <button type="button" class="btn btn-success" style="width: 80px;margin-top: -29%;margin-left:75%;">Verstuur</button>-->
<!--              </div>-->


          </div>


      </div>


</body>
</html>
