<?php
	require("../model/config/database.php");
	session_start();
	$page_number = isset($_GET['page-number']) ? $_GET['page-number'] : 1;
	$page_size = 5;
	$offset = $page_size * ($page_number - 1);
	if ($page_number > 1) {
?>
<a onclick="loadPage('/camagru/controller/feed_script.php?page-number=<?=$_GET['page-number'] - 1?>', render, err)">prev</a>
<?php
	}
	try {
		$sql = "SELECT COUNT(*) FROM $db.`images`";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$total_posts = $stmt->fetch()[0];
		$sql = "SELECT `images`.*, `user`.`user_username` FROM $db.`images` LEFT JOIN $db.`user` ON `user`.`userid`=`images`.`userid` ORDER BY `creation_date` DESC LIMIT $page_size OFFSET $offset";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{?>
				<div class="post" id="post-<?=$row['imageid']?>">
					<div class="uploader-info">
						<h1><?=htmlspecialchars($row['user_username'])?></h1>
				</div>
				<a onclick="loadPage('/camagru/controller/posts.php?imageid=<?=$row['imageid']?>', render, err)">
					<div class="image">
						<img src="<?=$row['path']?>" width="50%"/>
					</div>
				</a>
			</div>
		<?php
		}
	}
	catch (Exception $e){
		http_response_code(400);
		echo $e->getMessage();
	}
	if(($offset + $page_size) < $total_posts)
	{
?>
<a onclick="loadPage('/camagru/controller/feed_script.php?page-number=<?=$_GET['page-number'] + 1?>', render, err)">next</a>
<?php } ?>