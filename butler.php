<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Service.class.php");
include_once("classes/Db.class.php");

$user = new User;
$user->setId($_SESSION['userData']['id']);

$userData = $user->getUserById($user->getId());

if ($user->isButler()){
    header("location:butlerdeliver.php");
}
if ($user->isCustomer()){
    header("location:customerpending.php");
}

if (!empty($_POST) && isset($_POST['amount'])){
    $service = new Service();
    $service->setUserID($_SESSION['userData']['id']);
    $service->setStatus(1);
    $service->setAmount($_POST['amount']);
    $service->setCompleted(false);

    if ($service->saveService()){
        header("location:butlerdeliver.php");
    } else {
        //var_dump($service);
    }
}

$totalServices = $user->getAmountOfSservices();

?>

<!doctype HTML>
<html>

  <?php include 'includes/header.php' ?>

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

      <h1 class="headerTitle">Butler: <?php echo($_SESSION['userData']['first_name']); ?></h1>
      <img src="img/ButlerMode.png" alt="butler-header" class="header-img">
    </div>

      <div class="tutorial-video">
          <video src="" autoplay poster="">
          </video>
        </div>
    <div class="butlerOverview">
      <form class="form-group" action="" method="post" style="text-align:center;">
          <label for="amount">Ik kan nog ...</label>
          <select class="form-control" id="amount" name="amount">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
          </select>
          <label for="amount">consumptie(s) meedragen</label><br>
          <button type="submit" class="btn btn-danger btn-lg">Bevestig</button>
      </form>
    </div>
          <div class="loyalOverview">
            <div class=".col-xs-12" style="height:20px;">
              <span class="glyphicon glyphicon-bell" aria-hidden="true" style="margin-left: 5%;margin-right: 5%;line-height:1.1em;"></span><h5 style="padding-top: 2%;">Aantal Bedieningen: <?php echo $totalServices ?></h5>
            </div>
            <div class=".col-xs-12" style="height:20px;">
              <span class="Overview glyphicon glyphicon-heart" aria-hidden="true" style="margin-left: 5%;margin-right: 5%;line-height:1.1em;"></span><h5 style="padding-top: 2%;">Aantal Favorites: <?php echo $userData['loyalty'] ?></h5>
            </div>
            <div class=".col-xs-12" style="height:20px;">
              <span class="glyphicon glyphicon-gift" aria-hidden="true" style="margin-left: 5%;margin-right: 5%;line-height:1.1em;"></span></span><h5 style="padding-top: 2%;">Loyaliteits Punten: <?php echo $userData['loyalty'] ?></h5>
            </div>

          </div>


  </div>



</div>


</body>
</html>
