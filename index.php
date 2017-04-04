<?php

    spl_autoload_register(function ($class) {
        include_once("classes/" . $class . ".class.php");
    });

//    session_start();
//    if (!isset($_SESSION['user'])){
//        header('location: logout.php');
//    }

// DIT WORDT SPLASH SCREEN //


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

    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="nav navbar-default">
        <div class="container">
            <a href="index.php"><div class="logo"></div></a>

            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Go</button>
            </form>
            <ul class="nav navbar-nav">
                <li><a class="profile" href="profile.php">Profile</a></li>
                <li><a class="logout" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

</header>
<div class="container">



</div>


</body>
</html>