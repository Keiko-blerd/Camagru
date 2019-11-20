<form action="/camagru/controller/update_profile_script.php" method="post" enctype="multipart/form-data">
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