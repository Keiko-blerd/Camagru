<?php
	session_start();
	if (!($_SESSION['userid']))
	{
		header('location:/camagru/index.php');
	}
	require_once('../../model/config/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>Snap</title>
</head>
<body>
<div class="grid-container">
    <?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="show">
		<div class="camera">
			<div class="canvas_wrapper">
				<canvas id="CANVAS"></canvas>
				<video id="video" autoplay="true"></video>
			</div>
			<div class="small_images_display">
				<img id="image-display" width="200px"/>
				<img id="sticker-display" width="200px"/>
			</div>
			<div class="fields">
				<input type="file" id="fileupload"/>
				<input type="button" id="capture" value="snap!!"/>
				<input type="button" id="save-btn" value="save"/>
			</div>
			<div class="stickers">
				<img id = "blue-wings" src="../../img/stickers/blue-wings.png" onclick="addsticker(this.id)" width="50" height="50" alt="teststicker"/>
				<img id = "frame" src="../../img/stickers/frame.png" onclick="addsticker(this.id)" width="50" height="50" alt="teststicker2"/>
				<img id = "heart" src="../../img/stickers/heart.png" onclick="addsticker(this.id)" width="50" height="50" alt="teststicker3"/>
			</div>
			<div id="pastposts">
				<?php
					$stmt = $conn->prepare("SELECT * FROM $db.`images` WHERE `userid`=? ORDER BY `creation_date` DESC LIMIT 5 ");
					$stmt->execute(array($_SESSION['userid']));
					while ($image = $stmt->fetch(PDO::FETCH_ASSOC))
					{
				?>
					<img src="<?=$image['path']?>"/>
				<?php
					}
				?>
			</div>
		</div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
<script src="/camagru/js/camera.js"></script>
</html>