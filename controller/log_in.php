<?php
session_start();
require_once ('../model/create_tables.php');
$fields_error = $accounts_error = "";  
    if (isset($_POST["login"]))  
        {  
            $log_email = $_POST["logemail"];
            $log_password = $_POST["logpass"];
        if (empty($_POST["logemail"]) || empty($_POST["logpass"]))  
            {  

                    $fields_error = 'All fields are required';  
            }  
            else  
            { 
                try{
                    $statement = $conn->prepare("SELECT * FROM $db.user WHERE user_email = :email");
                    $statement->execute(array('email' => $log_email));  
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    $count = $statement->rowCount();  
                    if(($count > 0) && ($row['user_valid'] == 1))  
                    {
                        $_SESSION['userid'] = $row['userid'];
                        $_SESSION['username'] = $row['user_username'];
                        $_SESSION['usermail'] = $row['user_email'];

                        echo "maybe";

                        if (password_verify($log_password, $row['user_password'])){
                            
                            echo "before";

                            header('location:/camagru/index.php');

                            echo "after";
                    }  
                    
                    }
                    else  
                    {  
                        $account_error = 'Please Verify Or Register Account';  
                    }  
            }
            catch(PDOException $e)  
            {  
                 $e->getMessage();  
            }  
        }  
    }  
 ?>