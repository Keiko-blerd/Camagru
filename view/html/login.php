<?php require_once('../../model/create_tables.php')  ?>
<?php  $fields_error = $accounts_error = ""; ?>
<div class="wrapper2">
    <div class="login-wrap">
        <form action="/camagru/controller/sign_in.php" method="post" class="login-html">
            <a onclick="loadPage('view/html/login.php', render, err)"><label  class="tab">Sign In</label></a>
            <a onclick="loadPage('view/html/register.php', render, err)"><label  class="tab">Sign Up</label></a>
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
                        <a href="forgot_password_script.php">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>