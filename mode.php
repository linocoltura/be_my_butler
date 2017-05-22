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
<h2 class="animated bounceInDown" style="text-align:center; padding-top:15%;">Ga verder als...</h3>

<div class="row">

  <div class="border col-xs-6">
    <a href="butler.php">
      <h3 class="titleLeft">Butler</h3>
    <img src="img/Mode_Butler.svg" alt="Butler Mode" class="imgMode" id="float-left"></a>
  </div>

  <div class="border col-xs-6">
    <a href="customer.php">
      <h3 class="titleRight">Klant</h3>
    <img src="img/Mode_Supporter.svg" alt="Supporter Mode" class="imgMode" id="float-right"></a>
  </div>
</div>

  </div>

</div>

</body>
</html>
