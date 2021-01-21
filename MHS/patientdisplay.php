<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";

?>

<!DOCTYPE html>
<html>

<head>
	<title>PATIENT'S DETAILS</title>
	<link rel="stylesheet" href="tablestyle.css">

</head>

<body>
	<br>
	<table class="fixed">
		<col width="10px" />
		<col width="17px" />
		<col width="17px" />
		<col width="15px" />
		<col width="10px" />
		<col width="20px" />
		<col width="17px" />
		<col width="25px" />
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th></th>
		</tr>


		<?php


		$sql = "SELECT patient_id,name,gender,age,email,phone,address FROM patient";

		$result = $con->query($sql);
		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {
				$id = $row['patient_id'];
				$name = $row['name'];
				$gender = $row['gender'];
				$age = $row['age'];
				$email = $row['email'];
				$phone = $row['phone'];
				$address = $row['address'];

		?>
				<tr id=<?php echo $id; ?>>
					<td><?php echo $id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $gender; ?></td>
					<td><?php echo $age; ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $address; ?></td>
					<td><input type="button" value="Add Data" onclick="window.location.href = 'addpatientdata.php?id=<?php echo $id; ?>'"></td>
				</tr>
			<?php
			}
		} else {
			echo '<script>alert("0 results")</script>';
			?>
		<?php
		}
		$con->close();
		?>

	</table>
</body>

<script>
	addData(id) {
		var answer = confirm("Add data to this patient?");
		if (answer) {
			window.location.href = "manage-project.php?deleteProjectbit";
		} else {}


	}
</script>

</html>