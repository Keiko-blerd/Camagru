<?php
	session_start();
	if (!($_SESSION['userid']))
	{
		http_response_code(403);
		die();
	}
	//	header('location:/camagru/index.php');


	require_once('../../model/config/database.php');
?>
<canvas id="CANVAS"></canvas>
<img id="image-display" width="200px"/>
<img id="sticker-display"  width="200px"/>
<video id="video" autoplay="true"></video>
<input type="file" id="fileupload"/>
<input type="button" id="capture" value="snap!!"/>
<input type="button" id="save-btn" value="save"/>
<div>
	<ul><img id = "thumb1" src="uploads/stickers/images.png" onclick="addsticker()
	" width="50" height="50" alt="teststicker"/></ul>
</div>
<div id="pastposts">
	<?php
		$stmt = $conn->prepare("SELECT * FROM $db.`images` WHERE `userid`=? LIMIT 5");
		$stmt->execute(array($_SESSION['userid']));
		while ($image = $stmt->fetch(PDO::FETCH_ASSOC))
		{
	?>
		<img src="<?=$image['path']?>"/>
	<?php
		}
	?>
</div>
<script src="/camagru/controller/camera.js"></script>