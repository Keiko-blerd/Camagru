<div class="login-wrap">
    <form action="" method="post" class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
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