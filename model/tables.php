<?php
require_once ('./database.php');
try {
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS $db.user (
        userid INT(6) AUTO_INCREMENT PRIMARY KEY,
        user_username VARCHAR(30) NOT NULL UNIQUE,
        user_email VARCHAR(100) NOT NULL UNIQUE,
        user_password VARCHAR(255) NOT NULL,
        user_vkey VARCHAR(255) NOT NULL UNIQUE,
        userdp MEDIUMBLOB NULL,
        user_valid tinyint(1) DEFAULT '0'
        )";
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "Table user created successfully<br>";
    }
catch(PDOException $e)
    {
        $e->getMessage();
    } 
?>
