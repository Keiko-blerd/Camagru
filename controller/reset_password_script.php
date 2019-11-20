<?php

require_once('../model/config/database.php');

if(isset($_GET['user_vkey']) && isset($_POST['new_pas']))
{
   if(strlen($_POST['new_password']) >= 8 && $_POST['new_password']=== $_POST['retype_password'])
    { 
        $password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $f_vkey = $_GET['user_vkey'];
        $sql = "UPDATE $db.user set user_password='$password' WHERE user_vkey='$f_vkey' LIMIT 1";
        if ($conn->exec($sql)){

            echo "<script>alert('Sorry, no user exists on our system with that email')</script>";

           header('location:../index.php');
        
        }
    } 
    else {
        echo"<script>alert('passwords dont match or is less than 8 characters!')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>change_password</title>
    <link rel="stylesheet" href="styles.css">

<body>
    <form method="post" >
        <table align = "center" width=400>
            <tr align = center>
                <td colspan = "8">
                <h1>CAMAGRU</h1>
                    <h2>change password here!</h2>
                </td>
            </tr>
            <tr>
                <td align = "right"><strong>new password :</strong></td>
                <td><input type="password" name="new_password" placeholder="new password" required></td>
            </tr>
            <tr>
                <td align = "right"><strong>re-enter password :</strong></td>
                <td><input type="password" name="retype_password" placeholder="re-enter password" required></td>
            </tr>
                <td align = "center" colspan = "8"><input type= "submit" name="new_pas" value= "submit!"></td>
        </table>
    </form>
</body>
</html>