<?php

require_once ('./model/tables.php');

$alias_error = $email_error = $pass_error = $re_error = "";

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if(isset($_POST["submit"])){
   $usrname = $_POST['username'];
    $user_email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirm'];
    $vkey = md5(time().$usrname);

    if (empty($usrname)){
        $alias_error = 'Username Required';
    }else{
        $usrname = clean_input($usrname);
        if(!preg_match("/^[a-zA-z]*$/",$usrname)){
            $alias_error = 'Only Letters Allowed!';
        }
    }

    if (empty($user_email)){
        $email_error = 'Email is Required';
    }else{
        $user_email = clean_input($user_email);
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $email_error = 'Please Enter valid Email Address!';
        }
    }

    if (empty($pass) || (!preg_match('/[A-Z]/', $pass)) || strlen($pass) < 8){
        $pass_error = "Password must have 8 or more characters with atleast 1 uppercase letter";
    }else{
        $pass = clean_input($pass);
        if (empty($confirmpass) || strcmp($pass, clean_input($confirmpass)) !== 0 ){
        $re_error = 'Passwords do not match';
        }
    }
    if (empty($pass_error) && empty($re_error)){
        $hash = password_hash($pass, PASSWORD_BCRYPT);
    }
    if (empty($alias_error) && empty($email_error) && empty($pass_error) && empty($re_error)){

        try {
                    
                $sql = "INSERT INTO $db.user (user_username, user_email, user_password, user_vkey)
                VALUES (:username, :email, :password, :vkey)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['username'=>$usrname, 'email'=>$user_email, 'password'=>$hash, 'vkey'=>$vkey]);

                $user_email = $_POST['email'];
                $subject = "Verification email";
                $message = "<a href='http://localhost:8080/camagru/controller/email_verification.php?user_vkey=$vkey'>Validate account</a>";
                $headers = 'From: info@camagru.co.za'."\r\n";
                $headers .= "MIME-Version: 1.0"."\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

                $result = mail($user_email, $subject, $message, $headers);
                echo "<script>alert('Thank you for registering. We have sent you a verification link')</script>";
            }
            catch(PDOException $e)
            {
                 $e->getMessage();
            }
        }
    }
?>