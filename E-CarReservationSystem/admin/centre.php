<?php
    require 'db.php';
    include 'navbar.php';

    if (isset($_POST['add'])) {
		$hname = $_POST['hname'];
		$dname = $_POST['dname'];

		$addcentre = "INSERT INTO `servicecenter`(`distrinct`, `hangername`) VALUES ('$dname','$hname')";
		if (!mysqli_query($con,$addcentre)) {
			echo "<script>alert('add failed!')</script> ";
			header("refresh:0;url = centre.php");
		}else{
			echo "<script>alert ('Add Successfully!')</script> ";
			header("refresh:0;url = centre.php");
		}
	}

    ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Centre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
<table class="active" id="mycar" style="width: 100%">
						<tr>
							<th>Centre ID</th>
							<th>Centre Distrinct</th>
							<th>Workshop Name</th>


							<?php 

							$sql = "SELECT * FROM  `servicecenter`" ;
							$result = $con->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result -> fetch_assoc()) {
									$centerid = $row['centerid'];
									$distrinct = $row['distrinct'];
									$hangername = $row['hangername'];
							?>
						</tr>
						<tr>
							<td style="text-align: center;"><?php echo $centerid; ?></td>
							<td style="text-align: center;"><?php echo $distrinct; ?></td>
							<td style="text-align: center;"><?php echo $hangername; ?></td>
						</tr>
						<?php
              				}
              			}
              			else{
            			?>
            			<?php
            				}

            ?>
                </table><br><br>
    
    <h2>Add Service Centre</h2>
    <form action="" method="post">
    <label for="distrinctname">Distrinct :</label>
    <input type="text" require="" name="dname"> &nbsp;  &nbsp; 
    <label for="hangername">Name</label>
    <input type="text" require="" name="hname"><br><br>
    <input type="submit" name="add" id="add" value="Add Centre ">
    </form>


</body>
</html>