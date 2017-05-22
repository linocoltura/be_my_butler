<?php

    spl_autoload_register(function ($class) {
        include_once("classes/" . $class . ".class.php");
    });


?>

<!doctype HTML>
<html>
<?php include 'includes/header.php' ?>
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
