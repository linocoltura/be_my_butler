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
                <img src="img/pint.svg" alt="Full Pint" class="beerSpots animated infinite pulse" data-toggle="modal" data-target="#exampleModalLong">
                    <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">
                        <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">




            </div>



        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Plaats uw bestelling:</h4>
                      <span class="glyphicon glyphicon-time"></span>
                </div>
                <div class="modal-body">



                        <div class="form-group" style="margin-top:0;">
                              <label for="sel1">Drank Menu:</label>
                              <select class="form-control" id="sel1">
                                <option>Bier</option>
                                <option>Cola</option>
                                <option>Koffie</option>
                                <option>Water</option>
                              </select>
                            </div>
                            <label for="priceDrinks">€ 2.50</label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success btn-secondary" data-dismiss="modal">Bevestig</button>
                </div>
            </div>
        </div>
    </div>



    <div class="test">
        <?php foreach ($drinks as $drink): ?>
            <p><?php echo $drink['name'] ?></p>
        <?php endforeach; ?>
    </div>

</div>

<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
