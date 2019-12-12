<?php
	require_once("../model/config/database.php");
	session_start();
	if (!($_SESSION['userid']))
	header('location:/camagru/view/html/sign_in.php');
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{   
	$commenttext = htmlspecialchars($_POST['cmts']);
	$imageid = $_POST['image_id'];
	$ID = $_SESSION['userid'];
	try {
		$sql = "INSERT INTO $db.comments (`commenttext`, `userid`, `imageid`) VALUES (?, ?, ?)";
		$statement = $conn->prepare($sql);
		$statement->execute(array($commenttext, $ID, $imageid));
		$stmt = $conn->prepare("SELECT `user`.`user_email` FROM `$db`.`images` LEFT JOIN `$db`.`user` ON `user`.`userid`=`images`.`userid` WHERE `user`.`user_preff`=1 AND `images`.`imageid`=?");
		$stmt->execute(array($imageid));
		if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$email=$row["user_email"];

			$message = "Hi there, You have a new notification!";
			mail($email, "New Notification", $message, "From :info@camagru.co.za");
			echo"<script>alert('New Comment!')</script>";
 
			header('location:/camagru/view/html/feed.php');
		}
	}
	catch(Exception $e)
	{
		$e->getMessage();
	}
	}
?>