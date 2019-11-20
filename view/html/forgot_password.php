<?php
    require_once('../../controller/forgot_password_script.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forgot password</title>
    <link rel="stylesheet" href="styles.css">

<body>
    <form action="" method = "post" >
        <table align = "center"   width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>Insert Your Email!</h2>
                </td>
            </tr>
            <tr>
                <td align = "right"><strong>Email :</strong></td>
                <td><input type="text" name="f_email" placeholder="enter your email" required ="required"></td>
            </tr>
                <td align = "center" colspan = "8"><input type= "submit" name="f_pass" value= "submit"></td>
        </table>
    </form>
    <center><h3>Back To <a href= "../../controller/log_in.php"> Login</a></h3></center>
</body>
</html>