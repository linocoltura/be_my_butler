<?php

include_once("includes/facebooksession.php");
include_once("classes/Drink.class.php");
include_once("classes/User.class.php");
include_once("classes/Service.class.php");

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

    $service = new Service();
    $services = $service->getServices();


    if (!empty($_POST) && isset($_POST['modalService']) && isset($_POST['userID']) && isset($_POST['drink'])){
        $userID = $_POST['userID'];
        $drink = $_POST['drink'];
        //$serviceID = $_POST['modalService'];

        echo $userID, $drink, $_POST['modalService'];

        $saveService = new Service();
        $saveService->setServiceID($_POST['modalService']);

        if ($saveService->saveCustomer($userID,$drink)){
            header('Location: customerpending.php?serviceID='.$_POST['modalService']);
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
    <link rel="stylesheet" href="css/animate.css" />

    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
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

<!--        <div class="orderOverview">-->
<!---->
<!--            <div class="service" id="HIERKOMTID">-->
<!---->
<!--                <img class="userAvatar"src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="Avatar">-->
<!--                    <p class="userName">Mike Matthews</p>-->
<!--                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>-->
<!--                <div class="inlineBeerSpots">-->
<!--                    <img src="img/pint.svg" alt="Full Pint" class="beerSpots animated infinite pulse" data-toggle="modal" data-target="#exampleModalLong">-->
<!--                    <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">-->
<!--                    <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->


    <?php if(!empty($services)): ?>

        <?php foreach ($services as $service): ?>
            <div class="service" id="<?php echo $service['serviceID']?>">

                <?php
                $serviceUser = new User();
                $activeServiceUser = $serviceUser->getUserById($service['userID']);
                $activeService = new Service();
                $activeService->setServiceID($service['serviceID']);
                $activeService->setAmount($service['amount']);
                ?>
                <img class="userAvatar" src="<?php echo $activeServiceUser['picture'] ?>" alt="Avatar">
                <p class="userName"><?php echo $activeServiceUser['first_name']?></p>
                <!--            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>-->
                <div class="inlineBeerSpots">
                    <?php
                    for ($i = 0; $i < $activeService->getAvailableConsumptions(); $i++):
                        ?>
                        <img class="beerSpots animated infinite pulse fullpint" src="img/pint.svg" alt="Full Pint" class="beerSpots animated infinite pulse" data-toggle="modal" data-target="#popupmodal">
                    <?php endfor; ?>

                    <?php
                    for ($i = 0; $i < $activeService->getClaimedConsumptions(); $i++):
                        ?>
                        <img src="img/pintEmpty.svg" alt="Empty Pint" class="beerSpots">
                    <?php endfor; ?>
                </div>


            </div>
        <?php endforeach;?>
    <?php else: ?>

        <p>Geen butlers beschikbaar</p>

    <?php endif; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Plaats uw bestelling:</h4>
                      <span class="glyphicon glyphicon-time"></span>
                </div>
                <div class="modal-body">

                    <form action="" method="post">



                        <div class="form-group" style="margin-top:0;">
                            <label for="sel1">Drank Menu:</label>
                            <select name="drink" onchange="changeDrink();" class="form-control" id="sel1">
                                <?php foreach ($drinks as $drink): ?>
                                    <option data-price="<?php echo $drink['price'] ?>"<?php echo $drink['name'] ?>"><?php echo $drink['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label id="priceDrinks" for="priceDrinks">€ 2.00</label>
                        <input id="modalServiceID" type="hidden" value="test" name="modalService">
                        <input type="hidden" value="<?php echo $_SESSION['userData']['id'] ?>" name="userID">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-secondary">Bevestig</button>
                </div>

                    </form>
            </div>
        </div>
    </div>

</div>

<span id="beerActive" style="display: none;"></span>

<script type="text/javascript" src="js/script.js"></script>

</body>
</html>