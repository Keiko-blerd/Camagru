<?php
require_once ('../model/tables.php');

if (isset($_GET['user_vkey'])) {
    $vkey = $_GET['user_vkey'];
}

try{
    $sql = "UPDATE $db.user SET user_valid='1' WHERE user_vkey='$vkey'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location:../index.php');
       }
   catch(PDOException $e)
    {
     $e->getMessage();
    }
?>