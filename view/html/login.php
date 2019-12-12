<!DOCTYPE html>
<html lang="en">
<?php require_once('../../model/create_tables.php')  ?>
<?php require_once('../../controller/sign_in.php')  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>Log In</title>
</head>
<body>
<div class="grid-container">
    <?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="formshow">
        <div class="wrapper2">
            <div class="login-wrap">
                <form action="" method="post" class="login-html">
                    <a href="/camagru/view/html/login.php"><label  class="tab2">Sign In</label></a>
                    <a href="/camagru/view/html/register.php"><label  class="tab1">Sign Up</label></a>
                    <div class="login-form">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Email</label>
                                <input id="user" name="logemail" type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" name="logpass" type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input type="submit" name="login" class="button" value="Sign In">
                            </div>
                            <span class="error"> <?= $fields_error ?> </span>
                            <span class="error"> <?= $accounts_error ?> </span>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrapper3">
        
        </div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
</html>