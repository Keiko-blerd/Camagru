<?php
session_start();
	require_once("../../model/config/database.php");
?>
<?php
	try {
		$user_post = $_GET['imageid'];
		$sql = "SELECT `path`, `imageid`, `user`.`user_username`  FROM $db.`images` LEFT JOIN $db.`user` ON `user`.`userid`=`images`.`userid` WHERE `images`.`imageid` = ? LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array($user_post));
		$poster = $stmt->fetch();
		$sql = "SELECT `commenttext`, `path`, `images`.`imageid` FROM $db.`comments` LEFT JOIN $db.`images` ON `comments`.`imageid` = `images`.`imageid` WHERE `comments`.`imageid` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array($user_post));
		$comments = $stmt->fetchAll();
		//$sql = "SELECT (*), FROM $db.likes LEFT JOIN $db.images ON `likes`.`likeid` = `images`.`imageid` WHERE `likes`.`likeid` = ?";
		$sql = "SELECT count(*) AS likes FROM $db.likes LEFT JOIN $db.images ON `likes`.`likeid` = `images`.`imageid` WHERE `likes`.`imageid` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array($user_post));
		$likes = $stmt->fetch();
		?>
		<div class="image">
			<div class ="uploader-info">
				<h1><?=$poster['user_username']?></h1>
			</div>
			<img src="<?=$poster['path']?>" width="50%"/>
		</div>
		<?php
		foreach ($comments as $comment)
		{
			?>
			<div class="user_post" id="user_post<?=$comments['imageid']?>">
				<div class="comment" id="user_comment value="<?=$comment['commenttext']?>>
				 <h2><?=$comment['commenttext']?></h2>
				</div>
			</div>
		<?php
		}
		?>
		<form action="/camagru/controller/likes.php" method ="POST">
		<div class="likes">
			<input type=hidden name="image_id" value="<?=$poster['imageid']?>"/>
			<input type="submit" name="submission" value="<?=$likes['likes']?> Likes">
		</div>
		</form>
		<form action="/camagru/controller/comments.php" method ="POST">
		<div class="comments">
			<input type=hidden name="image_id" value="<?=$poster['imageid']?>"/>
			<input type="text" name="cmts" placeholder="comment">
			<input type="submit" name="submission" value="Submit">
		</div>
		</form>
		<?php
	}
	catch (Exception $e){
		echo $e->getMessage();
	}
?>