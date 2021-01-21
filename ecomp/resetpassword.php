<?php
	require 'db.php';	

	if (isset($_POST['reset'])) {
		$icnumber = $_POST['icnumber'];
		$newpassword = $_POST['newpassword'];
		$mothername = $_POST['mothername'];
			echo $a1;

		$result = mysqli_query($con,"SELECT mothername FROM user WHERE user_id = '$icnumber'");
		if ($result->num_rows > 1 ) {
			while($row = $result -> fetch_assoc()){
				$a1 = $row['mothername'];
			

				if ($mothername == $a1) {
					$sqlupdate = "UPDATE user SET password = '$newpassword' WHERE user_id = '$icnumber'";
					if(!mysqli_query($con,$sqlupdate)){
						echo "<script>alert('Update failed!')</script> ";
						header("refresh:0;url = index.php");
					}else{
						echo "<script>alert ('Update Successfully!')</script> ";
						header("refresh:0;url = index.php");
					}
				}

			}
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
</head>
<body>
	<div class="container" align="center">
		<h1>E-Comp Reservation System</h1>
	</div>
	<div class="form">
		<form class="form-horizontal" method ="post" action="">
			<fieldset>
				<div align="center">
					<h2>Reset Your Password</h2>
				</div><br>

				<div class="form-group" align="center">
					<label class="col-md-4 control-label" for="icnumber">IC Number</label>
					<input type="text" name="icnumber" id="icnumber" required="">
				</div><br>

				<div class="form-group" align="center">
					<label class="col-md-4 control-label" for="mothername">Mother's Name</label>
					<input type="text" name="mothername" id="mothername" required="">
				</div><br>

				<div class="form-group" align="center">
					<label class="col-md-4 control-label" for="newpassword">New Password</label>
					<input type="password" name="newpassword" id="newpassword" required="">
				</div><br>

				<div align="center" class="form-group">
					<input type="submit" name="reset" class="btn btn-success" value="Reset Password!">
				</div>

			</fieldset>
		</form>
		
	</div>
</body>
</html>