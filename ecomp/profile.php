<?php
	require 'db.php';
	include 'include/navbaruser.php';

	$sql = mysqli_query($con,"SELECT * FROM `user` WHERE user_id = $_SESSION[mysesi] ");
	if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$userid = $row['user_id'];
			$username = $row['username'];
			$email = $row['email'];
			$status = $row['status'];
			$password =$row['password'];
		}
	}

	if (isset($_POST['update'])) {
		$user = $_POST['username'];
		$mail = $_POST['email'];

		$sqlupdate = "UPDATE user SET username = '$user', email = '$mail' WHERE user_id = '$_SESSION[mysesi]' ;";
		if (!mysqli_query($con,$sqlupdate)) {
			echo "<script>alert('Update failed!')</script> ";
			header("refresh:0;url = profile.php");
		}else{
			echo "<script>alert ('Update Successfully!')</script> ";
			header("refresh:0;url = profile.php");
		}
	

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
</head>
<body>
	<h1 align="center">E-Comp Reservation System</h1>
	<fieldset>
		<h2 align="center">Update Profile</h2>
		<div align="center">
			<form action="" method="post">

			<label><b>Your Username:</b></label>
			<input type="text" name="username" id="username" value=" <?php echo $username; ?> "><br><br>

			<label><b>Your Email:</b></label>
			<input type="text" name="email" id="email" value="<?php echo $email; ?> "><br><br>
			
			<input type="submit" name="update" id="update" value="Update Profile!">
			</form>
		</div>
		
	</fieldset>
</body>
</html>