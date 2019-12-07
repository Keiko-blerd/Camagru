<?php

require_once('../../model/config/database.php');

$match = "";

if(isset($_GET['user_vkey']) && isset($_POST['new_pas']))
{
   if(strlen($_POST['new_password']) >= 8 && $_POST['new_password']=== $_POST['retype_password'])
    { 
        $password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $f_vkey = $_GET['user_vkey'];
        $sql = "UPDATE $db.user set user_password='$password' WHERE user_vkey='$f_vkey' LIMIT 1";
        if ($conn->exec($sql)){

           header('location:../html/login.php');
        
        }
    } 
    else {
        $match = "Passwords dont match or is less than 8 characters!";
    }
}
 
?>