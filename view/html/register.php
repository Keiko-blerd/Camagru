<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<?php require_once('../../model/create_tables.php')  ?>
<?php require_once('../../controller/sign_up.php')  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <script src="/camagru/controller/home.js"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>Register</title>
</head>
<body>
<div class="grid-container">
    <div class="nav_wrapper">
        <?php include('../../includes/nav.php') ?>
    </div>
    <div class="topbar_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="show">
        <div class="wrapper2">
            <div class="login-wrap">
                <form action="" method="post" class="login-html">
                    <a href="/camagru/view/html/login.php"><label  class="tab">Sign In</label></a>
                    <a href="/camagru/view/html/register.php"><label  class="tab">Sign Up</label></a>
                    <div class="login-form">
                        <div class="sign-up-htm">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" name="username" type="text" class="input">
                                <span class="error"><?=$alias_error ?></span>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" name="pass" type="password" class="input" data-type="password">
                                <span class="error"><?=$pass_error ?></span>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Repeat Password</label>
                                <input id="pass"  name="confirm" type="password" class="input" data-type="password">
                                <span class="error"><?=$re_error ?></span>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input id="pass" name="email" type="text" class="input">
                                <span class="error"><?=$email_error ?></span>
                            </div>
                            <div class="group">
                                <input type="submit" name="submit" class="button" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already Member?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
</html>