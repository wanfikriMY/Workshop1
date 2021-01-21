<?php
    require 'db.php';
    include 'navbar.php';

    if (isset($_GET['carid'])) {
		$carid = $_GET['carid'];
    }

    $sql = mysqli_query($con,"SELECT * FROM `car` WHERE carid = $carid ");
	if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$userid = $row['user_id'];
			$plate = $row['plate'];
			$type = $row['type'];
            $manufacturer =$row['manufacturer'];
            $model =$row['model'];
		}
    }
    

?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Car Management</h1>
        <label for="carplate"><b>Number Plate   :</b></label>
        <?php echo $plate; ?><br><br>

        <label for="carplate"><b>Car Type   :</b></label>
        <?php echo $type; ?><br><br>
        
        <label for="carplate"><b>Car Manufacturer   :</b></label>
        <?php echo $manufacturer; ?><br><br>

        <label for="carplate"><b>Car Model :</b></label>
        <?php echo $model; ?><br><br>

        <form>
            <input type="button" value="Service This car?" onclick="window.location.href='servicecar.php?service=<?php echo $carid; $service=$carid; ?>'"/>
            <input type="button" value="Delete Car?" onclick="window.location.href='deletecar.php?delete=<?php echo $carid; $delete=$carid; ?>'"/><br><br>
        </form>


    </body>
    

</html>
