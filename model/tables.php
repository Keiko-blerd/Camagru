<?php
require_once ('./model/config/database.php');
try {
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS $db.user (
        userid INT(6) AUTO_INCREMENT PRIMARY KEY,
        user_username VARCHAR(30) NOT NULL UNIQUE,
        user_email VARCHAR(100) NOT NULL UNIQUE,
        user_password VARCHAR(255) NOT NULL,
        user_vkey VARCHAR(255) NOT NULL UNIQUE,
        userdp INT(6),
        user_valid tinyint(1) DEFAULT '0'
        )";
    // use exec() because no results are returned
    $conn->exec($sql);
	// echo "Table images created successfully<br>";
	$sql = "CREATE TABLE IF NOT EXISTS $db.images (
        imageid INT(6) AUTO_INCREMENT PRIMARY KEY,
        userid INT(6) NOT NULL, 
        `path` VARCHAR(255) NOT NULL UNIQUE,
		`creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
		FOREIGN KEY (userid) REFERENCES user(userid) ON DELETE CASCADE
        )";
    // use exec() because no results are returned
	$conn->exec($sql);
	
	$sql = "ALTER TABLE $db.user ADD CONSTRAINT f_image_c FOREIGN KEY (userdp) REFERENCES images(imageid)";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    // echo "Table images created successfully<br>";
    }
catch(PDOException $e)
    {
        $e->getMessage();
    } 
?>
