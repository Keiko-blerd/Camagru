<?php
require_once ('setup.php');

$db = "camagru";

try {
    // sql to create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
     $e->getMessage();
    }
?>