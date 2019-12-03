<?php
    require_once('../../controller/forgot_password_script.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <script src="/camagru/controller/home.js"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>

<body>
<div class="grid-container">
    <?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="forgotshow">
            <div class="forgot-wrap">
                <form action="./camagru/controller/forgot_password_script.php" method="post" class="login-html">
                    <a href="/camagru/view/html/login.php"><label  class="tab2">Reset Password</label></a>
                    <div class="login-form">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Email</label>
                                <input id="user" name="f_email" type="text" class="input">
                            </div>
                            <div class="group">
                                <input type="submit" name="f_pass" class="button" value="Reset">
                            </div>
                            <span class="error"> <?= $email_error ?> </span>
                            <div class="hr"></div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
</html>


