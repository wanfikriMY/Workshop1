<?php
	require 'db.php';
	include '/include/navbaruser.php';

	if(isset($_GET['reservation_id'])){

    $reservation_id = $_GET['reservation_id'];
  
    $sql = "DELETE FROM `ecomp`.`reservation` WHERE `reservation`.`reservation_id`=$reservation_id AND `status` = 'not approved';";
  
   
   if($con->multi_query($sql) === TRUE){

       echo"<script>alert('Your Reservation Updated');</script>";
       echo "<script>window.location.assign('myreservation.php')</script>";
   }
   else{
       echo"<script>alert('Your Booking Already Approved! Please Come to Lab on time!')</script> ";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
</head>
<body>
	<div>
		<div class="container" align="center">
			<h1>E-Comp Reservation System</h1>
			<fieldset>
				<h2>My Reservation</h2><br>

				<table class="active" id="myreservation" style="width: 100%">
						<tr>
							<th>PC ID</th>
							<th>Date</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Status</th>
							<th>Action</th>

							<?php 

							$sql = "SELECT * FROM  `reservation` WHERE user_id = '$_SESSION[mysesi]'" ;
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result -> fetch_assoc()) {
									$reservation_id = $row['reservation_id'];
									$pc_id = $row['pc_id'];
									$reservation_date = $row['reservation_date'];
									$start_time = $row['start_time'];
									$end_time = $row['end_time'];
									$status = $row['status'];
							?>

						</tr>
					
						<tr>
							<td style="text-align: center;"><?php echo $pc_id; ?></td>
							<td style="text-align: center;"><?php echo $reservation_date; ?></td>
							<td style="text-align: center;"><?php echo $start_time; ?></td>
							<td style="text-align: center;"><?php echo $end_time; ?></td>
							<td style="text-align: center;"><?php echo $status; ?></td>
							<td style="text-align: center;"><a href="myreservation.php?reservation_id=<?php echo $reservation_id; ?>" class="button button4 button-sm">Cancel Booking</a></td>
						</tr>

						<?php

              				}
              			}
              			else{
            			?>
            			<?php
            				}

            ?>

				</table>
			</fieldset>
			
		</div>
	</div>
</body>
<style>
	table, th {
    border: 2px solid black;
}		
</style>
</html>