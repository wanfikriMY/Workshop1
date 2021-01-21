<?php
include "connection.php";
include "homenavbar.html";
include "footer.html";
?>
<!DOCTYPE html>
<html>

<head>
	<title>PATIENT LOGIN</title>
	<link rel="stylesheet" href="mystyle.css">
</head>
<style type="text/css">

	table {
      border-style: hidden;
      background-color: white;
      border-radius: 12px;
    }

    td,
    tr {
      padding: 12px 12px;
      align-items: "center";
    }

    table.center {
      margin-left: auto;
      margin-right: auto;
    }

</style>

<body>
	<div class="solid">
		<h1>USER LOGIN</h1>
	</div>
	<br><br>
	<form method="POST">
		<table class="center">

			<tr>
				<td>ID :</td>
				<td><input type="text" name="patient_id" placeholder="Enter id" required="required"></td>
			</tr>
			<tr>
				<td>PASSWORD :</td>
				<td><input type="password" name="password" placeholder="Enter password" required="required"></td>
			</tr>

			<tr>
				<td>&nbsp</td>
				<td><input type="submit" name="submit" value="Login">

			</tr>
	
			

		</table>
	</form>
		
</body>

</html>

<?php

if (isset($_POST['submit'])) {
	$patient_id = $_POST['patient_id'];
	$password = $_POST['password'];
	$query = "SELECT * from patient where patient_id='$patient_id'and password='$password'";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result)) {
		if ($row['patient_id'] == $patient_id && $row['password'] == $password) {
			$_SESSION['type'] = 'patient';
			$_SESSION['id'] = $patient_id;

			echo $_SESSION['id'];
			echo "<script>alert('Login successful! " . $_SESSION['id'] . "')</script>";
			echo "<script>window.location.assign('userhome.php?session=" . $_SESSION['id'] . "')</script>";
		}
	}
}

?>
