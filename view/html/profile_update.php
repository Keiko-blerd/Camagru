<?php
	session_start();
	if (!($_SESSION['userid']))
	{
		header('location:/camagru/index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('../../model/create_tables.php')  ?>
<?php require_once('../../controller/update_profile_script.php')  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f7d9248e42.js" crossorigin="anonymous"></script>
    <script src="/camagru/controller/home.js"></script>
    <link href='../stylesheets/main.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/responsive.css' rel='stylesheet' type='text/css'>
    <link href='../stylesheets/user_form.css' rel='stylesheet' type='text/css'>
    <title>User Settings</title>
</head>
<body>
<div class="grid-container">
	<?php include('../../includes/topbar.php') ?>
    <div class="nav_wrapper">
        <?php include('../../includes/header.php') ?>
    </div>
    <div id="show">
        <div class="wrapper1">
			<div class="update">
				<form action="" method="post" enctype="multipart/form-data">
					<table align = "center" width=400>
						<tr align = center>
							<td colspan = "8">
								<h2>Update Profile</h2>
							</td>
						</tr>
						<tr>
							<td align = "right"><strong>Update Username :</strong></td>
							<td><input type="text" name="user_name" placeholder="Enter new username"></td>
							<td align = "center" colspan = "8"><input type="submit" name="username" value="Update"></td>
						</tr>
						<tr>
							<td align = "right"><strong>Update Email :</strong></td>
							<td><input type="email" name="user_email" placeholder="Enter new email"></td>
							<td align = "center" colspan = "8"><input type="submit" name="email" value="Update"></td>
						</tr>
						<tr>
							<td align = "right"><strong>Update Password :</strong></td>
							<td><input type="password" name="user_password" placeholder="Enter new password"></td>
						</tr>
						<tr>
							<td align = "right"><strong>Re-Enter Password :</strong></td>
							<td><input type="password" name="re_password" placeholder="Confrim your password"></td>
							<td align = "center" colspan = "8"><input type="submit" name="password" value="Update"></td>
						</tr> 
					</table>
				</form>
			</div>
        </div>
    </div>
    <?php include('../../includes/footer.php') ?>
</div>
</body>
</html>