<?php
require_once ('../../model/config/database.php');
try {
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS $db.user (
        userid INT(6) AUTO_INCREMENT PRIMARY KEY,
        user_username VARCHAR(30) NOT NULL UNIQUE,
        user_email VARCHAR(100) NOT NULL UNIQUE,
        user_password VARCHAR(255) NOT NULL,
        user_vkey VARCHAR(255) NOT NULL UNIQUE,
        userdp INT(6),
        user_valid tinyint(1) DEFAULT '0',
		user_preff tinyint(1) DEFAULT '0'
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
	//create comment table
	$sql = "CREATE TABLE IF NOT EXISTS $db.comments (
		commentid INT(6) AUTO_INCREMENT PRIMARY KEY,
		imageid INT(6) NOT NULL,
		userid INT(6) NOT NULL,
		commenttext TEXT(100),
		`creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
		FOREIGN KEY (imageid) REFERENCES images(imageid) ON DELETE CASCADE,
		FOREIGN KEY (userid) REFERENCES user(userid) ON DELETE CASCADE
		)";
	
	$conn->exec($sql);
	// echo "Table images created successfully<br>";
	// echo "Table comments created<br>";
	$sql = "ALTER TABLE $db.user ADD CONSTRAINT f_likes_c FOREIGN KEY (userdp) REFERENCES images(imageid)";
	$sql = "CREATE TABLE IF NOT EXISTS $db.likes (
		likeid INT(6) AUTO_INCREMENT PRIMARY KEY,
		userid	INT(6) NOT NULL,
		imageid INT(6) NOT NULL,
		FOREIGN KEY (imageid) REFERENCES images(imageid) ON DELETE CASCADE,
		FOREIGN KEY (userid) REFERENCES user(userid) ON DELETE CASCADE
		)";
	$conn->exec($sql);
	 
    }
catch(PDOException $e)
    {
        $e->getMessage();
    } 
?>
