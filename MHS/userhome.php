<?php
include 'connection.php';
session_start();
if (isset($_GET['session'])) {
	$_SESSION['id'] = $_GET['session'];
	$_SESSION['type'] = "patient";
}
include "usernavbar.html";
include "footer.html";
//include "sessionPatient.php";
?>
<!DOCTYPE html>
<html>

<head>
	<title>USER HOME</title>
	<link rel="stylesheet" href="mystyle.css">

</head>

<body>
	<br><br><br><br><br>
	<div class="solid">
		<h1>
			<center>WELCOME USER</center>
		</h1>
	</div>

	<div>
		<div class="solid">
		<h3>
			<center>YOUR NEXT APPOINTMENT :-</center>
		</h3>
	
		

		<?php

		$resultmind = mysqli_query($con, "SELECT *, MIN(appointment.date) from appointment WHERE patient_id = '$_SESSION[id]' GROUP BY patient_id");
		while ($row = mysqli_fetch_array($resultmind)) {
			$nextDate = $row['MIN(appointment.date)'];
		}

		if (isset($nextDate)) {


			$resultdate = mysqli_query($con, "SELECT * from appointment WHERE date = '$nextDate' AND patient_id = '$_SESSION[id]'");
			while ($row = mysqli_fetch_assoc($resultdate)) {
				$ses = $row['session'];
				$docId = $row['doc_id'];
				$remark = $row['remark'];
			}
		}

		?>

		<br>
		<?php
		if (isset($nextDate)) {
		?>

			Date : <?php echo $nextDate; ?> <br>
			Doctor name : <?php $drName = mysqli_query($con, "SELECT name FROM doctor WHERE doc_id = '$docId'");
							while ($row = mysqli_fetch_assoc($drName)) {
								echo $row['name'];
							} ?><br>
			Session : <?php echo $ses; ?>
		<?php
		}
		?>

	</div>
</div>
</body>

</html>