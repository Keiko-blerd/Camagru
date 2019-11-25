<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<?php require_once('./model/config/database.php')  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <script src="/camagru/controller/home.js"></script>
    <link href='./view/stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='./view/stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='./view/stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>Camagru</title>
</head>
<body>
<div class="grid-container">
    <div class="nav_wrapper">
        <?php include('./includes/nav.php') ?>
    </div>
    <div class="topbar_wrapper">
        <?php include('./includes/header.php') ?>
    </div>
    <div id="show">
        <div class="hero-wrapper">
            <h1 class="hero-header">Welcome To <span>Camagru</span></h1>
            <div class="content_wrapper">
                <p class="hero-text">
                    <?php 
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                    else{
                    echo "Please Click on the Lens to Login";
                    }?>
                </p>
                <div class="wrapper1">
                    <a href="/camagru/view/html/login.php">
                        <div class="button">
                            <span class="button-text">
                                <?php 
                                if(!isset($_SESSION['username'])){    
                                    echo "Press"; 
                                }?>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include('./includes/footer.php') ?>
</div>
</body>
</html>