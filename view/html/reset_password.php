<!DOCTYPE html>
<html lang="en">
    <?php require_once('../../controller/reset_password_script.php') ?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
<body>
<div class="grid-container">
    <?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="show">
        <div class="forgot-wrap">
            <form action="" method="post" class="login-html">
            <a href=""><label  class="tab2">Reset Password</label></a>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">New Password</label>
                        <input id="user" name="new_password" type="password" class="input">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Confirm Password</label>
                        <input id="user" name="retype_password" type="password" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" name="new_pas" class="button" value="Reset">
                    </div>
                    <span class="error"> <?= $match ?> </span>
                        <div class="hr"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include('../../includes/footer.php') ?>
</body>
</html>