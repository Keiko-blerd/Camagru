<?php

require_once('../../model/config/database.php');
$email_error = "";
if(isset($_POST['f_pass']))
{
    $f_email = $_POST['f_email'];

    $statement = $conn->prepare("SELECT * FROM $db.user WHERE user_email = :email AND user_valid = 1 LIMIT 1");  
    $array = array('email' => $f_email);
    $statement->execute($array);
    $row = $statement->fetch();
    if(empty($row))
    {
        $email_error = "Sorry, no user exists on our system with that email";
        return ;
    }
    else
    {    
            $f_vkey = $row['user_vkey'];
            $message = "Hi there, click on this <a href=\"http://localhost:8080/camagru/view/html/reset_password.php?user_vkey=" . $f_vkey . "\">link</a> to change password";
            mail($f_email, "change your password", $message, "From :info@camagru.co.za");
            echo"<script>alert('An email has been sent to you, you can close this page!')</script>";
    }
}

?>