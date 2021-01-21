<?php
include "connection.php";
include "homenavbar.html";
include "footer.html";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
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
		<h1>ADMIN LOGIN</h1>
	</div>
	<br><br>
	<form method="POST">
		<table class="center">

			<tr>
				<td>USERNAME :</td>
				<td><input type="text" name="name" placeholder="Enter username" required="required"></td>
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
	$name = $_POST['name'];
	$password = $_POST['password'];
	$query = "SELECT * from staff where name='$name'and password='$password'";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result)) {
		if ($row['name'] == $name && $row['password'] == $password) {
			session_start();
			$_SESSION['type'] = 'admin';
			$_SESSION['id'] = $name;
			echo "<script>alert('Login successful!')</script>";
			echo "<script>window.location.assign('adminhome.php')</script>";
		}
	}
}

?>