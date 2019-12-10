<!DOCTYPE html>
<html lang="en">
<?php require_once('../../controller/feed_script.php')  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <script src="/camagru/js/loader.js"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>Feed</title>
</head>
<body>
<div class="grid-container">
	<?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="show">
		<div id="posts">
			<a onclick="loadPage('view/html/feed.php?page-number=<?=$_GET['page-number'] - 1?>', render, err)">prev</a>
			<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{?>
				<div class="post" id="post-<?=$row['imageid']?>" >
    				<div class="uploader-info">
        				<h1><?=htmlspecialchars($row['user_username'])?></h1>
    				</div>
					<a onclick="loadPage('view/html/posts.php?imageid=<?=$row['imageid']?>', render, err)">
						<div class="image">
							<img src="<?=$row['path']?>" width="50%"/>
						</div>
					</a>
				</div>
			<?php }
			?>
			<a onclick="loadPage('feed.php?page-number=<?=$_GET['page-number'] + 1?>', render, err)">next</a>
		</div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
</html>