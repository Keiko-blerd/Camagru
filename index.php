<!DOCTYPE html>
<html lang="en">
<?php require_once('./controller/sign_in.php') ?>
<?php require_once('./controller/sign_up.php') ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
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
    <div class="hero-wrapper">
        <h1 class="hero-header">Welcome To <span>Camagru</span></h1>
        <div class="content_wrapper">
            <p class="hero-text">
                <?php 
                if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                }
                else{
                echo "Please Click on the Lens";
                }?>
            </p>
            <i id="hero-icon" class="fas fa-arrow-circle-down"></i>
            <div class="wrapper1">
                <div class="button" onclick="document.body.classList.add('active')">
                    <span class="button-text">Press</span>
                </div>
            </div>
            <div class="wrapper2">
                <div class="popup">
                    <div class="content">
                        <?php include('./includes/user_form.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./includes/footer.php') ?>
</div>
</body>
</html>