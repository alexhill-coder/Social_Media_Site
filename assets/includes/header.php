<?php 
require 'assets/config/config.php';

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Forum</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>

        <!-- CSS -->
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="assets/css/style.css" type="text/css" rel="stylesheet">

        <!-- An additional script to add icons from the website font awesome -->
        <script src="https://kit.fontawesome.com/ba7a185151.js" crossorigin="anonymous"></script>

    </head>
    <body class="background">

        <!-- <div class="top_bar">
            <div class="logo">
                <a href="index.php">Forum</a>
            </div>

            <nav>
                <a href="#"><?php echo $user['first_name']; ?></a>
                <a href="index.php"><i class="fa fa-home fa-lg"></i></a>
                <a href="#"><i class="fa fa-envelope fa-lg"></i></a>
                <a href="#"><i class="fa fa-bell-o fa-lg"></i></a>
                <a href="#"><i class="fa fa-users fa-lg"></i></a>
                <a href="#"><i class="fa fa-cog fa-lg"></i></a>
            </nav>

        </div> -->

        <nav class="navbar navbar-expand bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand logo" href="index.php">Forum</a>
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?php echo $userLoggedIn ?>"><?php echo $user['first_name']; ?></a>
                        <a class="nav-link" href="index.php"><i class="fa fa-home fa-lg"></i></a>
                        <a class="nav-link" href="#"><i class="fa fa-envelope fa-lg"></i></a>
                        <a class="nav-link" href="#"><i class="fa fa-bell-o fa-lg"></i></a>
                        <a class="nav-link" href="#"><i class="fa fa-users fa-lg"></i></a>
                        <a class="nav-link" href="#"><i class="fa fa-cog fa-lg"></i></a>
                        <a class="nav-link" href="assets/includes/handlers/logout.php"><i class="fa fa-sign-out fa-lg"></i></a>
                    </div>
                </div>
            </nav>

            <div class="wrapper">