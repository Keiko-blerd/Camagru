<?php
	require("../../model/config/database.php");
	session_start();
?>
<a onclick="loadPage('view/html/feed.php?page-number=<?=$_GET['page-number'] - 1?>', render, err)">prev</a>
<?php
	try {
		$page_number = $_GET['page-number'];
		$page_size = 5;
		$offset = $page_size * ($page_number - 1);
		$sql = "SELECT `images`.*, `user`.`user_username` FROM $db.`images` LEFT JOIN $db.`user` ON `user`.`userid`=`images`.`userid` ORDER BY `creation_date` DESC LIMIT $page_size OFFSET $offset";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{?>
			<div class="post" id="post-<?=$row['imageid']?>">
				<div class="uploader-info">
					<?=$row['user_username']?>
				</div>
				<div class="image">
					<img src="<?=$row['path']?>" width="50%"/>
				</div>
			</div>
		<?php
		}
	}
	catch (Exception $e){
		echo $e->getMessage();
	}
?>
<a onclick="loadPage('view/html/feed.php?page-number=<?=$_GET['page-number'] + 1?>', render, err)">next</a>