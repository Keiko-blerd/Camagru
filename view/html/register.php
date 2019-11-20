<?php require_once('../../model/create_tables.php')  ?>
<?php  $alias_error = $email_error = $pass_error = $re_error = ""; ?>
<div class="wrapper2">
    <div class="login-wrap">
        <form action="/camagru/controller/sign_up.php" method="post" class="login-html">
            <a onclick="loadPage('view/html/login.php', render, err)"><label  class="tab">Sign In</label></a>
            <a onclick="loadPage('view/html/register.php', render, err)"><label  class="tab">Sign Up</label></a>
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