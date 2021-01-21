<?php
    include 'db.php';
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
    
 /*   $sql = mysqli_query($con,"SELECT * FROM `car` WHERE user_id = $_SESSION[mysesi] ");
	if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$plate = $row['plate'];
			$type = $row['type'];
			$manufacturer =$row['manufacturer'];
			$model = $row['model'];
			$carid = $row['carid'];	
		}
	} */

?>

<html>

<body>
    <h1>
        Welcome, <?php echo $username; ?>
    </h1><br> 
    <h2>
        Your Registered Car : 
	</h2>
	
	<table class="active" id="mycar" style="width: 100%">
						<tr>
							<th>No Plate</th>
							<th>Car Type</th>
							<th>Manufacturer</th>
							<th>Model</th>



							<?php 

							$sql = "SELECT * FROM  `car` WHERE user_id = '$_SESSION[mysesi]'" ;
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result -> fetch_assoc()) {
									$plate = $row['plate'];
									$type = $row['type'];
									$manufacturer = $row['manufacturer'];
									$model = $row['model'];
									$carid = $row['carid'];	
							?>

						</tr>
					
						<tr>
							<td style="text-align: center;"><a class="btn btn-success" href="managecar.php?carid=<?php echo $carid; $manage=$carid; ?>"><?php echo $plate ?></a></td></td>
							<td style="text-align: center;"><?php echo $type; ?></td>
							<td style="text-align: center;"><?php echo $manufacturer; ?></td>
							<td style="text-align: center;"><?php echo $model; ?></td>
							<td></td>
							<td></td>
							<td><input type="button" value="Service" onclick="window.location.href='servicecar.php?service=<?php echo $carid; $service=$carid; ?>'"/></td>
						</tr>

						<?php

              				}
              			}
              			else{
            			?>
            			<?php
            				}

            ?>

				</table><br>

    <font color="Black">Register New Car?</font> <a href="registercar.php">Register here </a>
</body>
</html>