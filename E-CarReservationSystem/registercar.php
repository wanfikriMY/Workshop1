<?php
    require 'db.php';
	include 'navbar.php';
	
	$sql = mysqli_query($con,"SELECT * FROM `user` WHERE user_id = $_SESSION[mysesi] ");
	if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$userid = $row['user_id'];
			$username = $row['username'];
			$email = $row['email'];
			$password =$row['password'];
		}
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Car Rerservation System</title>
</head>
<body>
	<h1 align="center">E-Car Rerservation System</h1>
	<fieldset>
		<h2 align="center">Register New Car</h2>
		<div align="center">
			<form action="registrationcar.php" method="post">

				<label><b>Car Type :</b></label>
				<input list="type" id="cartype" name="cartype" placeholder="Car Type">
					<datalist id="type">
						<option value="Sedan">
						<option value="Coupe">
						<option value="MPV"></option>
					</datalist><br><br>

				<label>Number Plate :</label>
				<input type="text" name="numberplate" id="numberplate" placeholder="WNR9277"><br><br>

				<label>Manufacturer :</label>	
				<input list="type1" id="manu" name="manu" placeholder="Car Type">
					<datalist id="type1">
						<option value="Proton">
						<option value="Perodua">
						<option value="Honda">
						<option value="Toyota">
						<option value="BMW">
					</datalist><br><br>

				<label>Model :</label>
				<input type="text" name="model" id="model" placeholder="Exora"><br><br>


			<input type="submit" name="newcar" id="newcar" value="Register New Car">

				

			</form>

		</div>
		
	</fieldset>
</body>
</html>