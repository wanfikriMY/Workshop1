<?php
	require 'db.php';
	include  'include/navbaradmin.php';

	if (isset($_GET['report'])) {
		$pcid = $_GET['report'];
	}

	$sqlcount = mysqli_query($con, "SELECT COUNT(  `pc_id` ) AS count FROM reservation WHERE  `pc_id` = '$pcid'");
	if($sqlcount->num_rows > 0){
		while ($row = $sqlcount -> fetch_assoc()) {
			$count = $row['count'];
		}
	}

	$sqlpc = mysqli_query($con, "SELECT * FROM `pc` WHERE pc_id = $pcid");
	if ($sqlpc->num_rows > 0){
		while ($row = $sqlpc -> fetch_assoc()) {
			//$pcname = $row['name'];
			$pctype = $row ['pc_type'];
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
		<h2 align="center">Report and Statistic</h2>
	<div align="center">
		<label><b>PC ID 	:</b></label><?php echo $pcid; ?><br><br>
		<!--<label><b>PC Name 	:</b></label><?php echo $pcname;?><br><br>-->
		<label><b>Total Reserved 	:</b></label><?php echo $count ?> Time(s)<br><br>
		<label><b>Total Hour Reserved	:</b></label><?php $hour = 120*$count; $totalhour = $hour/60; echo $totalhour ?> Hour(s)<br><br>
	</div>
	</fieldset>
</body>
</html>