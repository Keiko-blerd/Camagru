<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
		<script src="/camagru/controller/home.js"></script>
		<link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
		<link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
		<link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
		<title>Snap Feed</title>
	</head>
	<body>
		<div class="grid-container">
			<?php include('../../includes/topbar.php') ?>
			<div class="nav_wrapper">
				<?php include('../../includes/header.php') ?>
			</div>
			<div id="show">
  
				<?php
					require("../../model/create_tables.php");
					session_start();
					$page_number = isset($_GET['page-number']) ? $_GET['page-number'] : 1;
					$page_size = 5;
					$offset = $page_size * ($page_number - 1);
					if ($page_number > 1) {
				?>
				<a onclick="loadPage('view/html/feed.php?page-number=<?=$_GET['page-number'] - 1?>', render, err)">prev</a>
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
											<?=$row['user_username']?>
										</div>
										<a onclick="loadPage('view/html/posts.php?imageid=<?=$row['imageid']?>', render, err)">
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
						<a onclick="loadPage('view/html/feed.php?page-number=<?=$_GET['page-number'] + 1?>', render, err)">next</a>
						<?php } ?>
			</div>
			<?php include('../../includes/footer.php') ?>
		</div>
	</body>
</html>