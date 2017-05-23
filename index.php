<?php

include_once("includes/facebooksession.php");
include_once("classes/User.class.php");
include_once("classes/Db.class.php");


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

    <h1 class="animated bounceInDown"><?php echo "Hallo ". $_SESSION['userData']['first_name'] ?></h1>


    <!-- Modal -->
    <div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content camera">

                <div class="modal-header">
                    <h4 class="modal-title">Scan uw ticket</h4>
                </div>
                <div class="modal-body">

                    <div class="videoContainer">
                        <video autoplay="true" id="videoElement"></video>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal" onclick="redirect()">Bevestig</button>
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
        location.href = "cashlessconnect.php";
    }
</script>

<script type="text/javascript" src="lib/html5-qrcode.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>


</body>
</html>
