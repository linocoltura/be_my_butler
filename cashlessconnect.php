<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Db.class.php");

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

        <h1 class="animated bounceInDown">Betaalkaart</h1>


        <!-- Modal -->
        <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content camera">

                    <div class="modal-header">
                        <h4 class="modal-title">Scan uw KVM cashless betaalkaart</h4>
                    </div>
                    <div class="modal-body">

                        <div class="videoContainer">
                            <video autoplay="true" id="videoElement"></video>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-secondary" data-dismiss="modal" onclick="redirect()">Bevestig</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(window).on('load',function(){
        window.setTimeout(function () {
            $('#popupmodal').modal('show');
        },1200)
    });
    function redirect(){
        location.href = "mode.php";
    }
</script>
<script type="text/javascript" src="js/script.js"></script>


</body>
</html>
