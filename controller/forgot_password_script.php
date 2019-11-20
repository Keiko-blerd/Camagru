<?php

require_once('../../model/config/database.php');
 
if(isset($_POST['f_pass']))
{
    $f_email = $_POST['f_email'];

    $statement = $conn->prepare("SELECT * FROM $db.user WHERE user_email = :email AND user_valid = 1 LIMIT 1");  
    $array = array('email' => $f_email);
    $statement->execute($array);
    $row = $statement->fetch();
    if(empty($row))
    {
        echo "<script>alert('Sorry, no user exists on our system with that email')</script>";
        return ;
    }
    else
    {    
            $f_vkey = $row['user_vkey'];
            $message = "Hi there, click on this <a href=\"http://localhost:8080/camagru/controller/reset_password_script.php?user_vkey=" . $f_vkey . "\">link</a> to change password";
            mail($f_email, "change your password", $message, "From :info@camagru.co.za");
            echo"<script>alert('An email has been sent to you, you can close this page!')</script>";
    }
}

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