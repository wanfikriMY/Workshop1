<?php
    include 'connection.php';
    include 'navbaruser.php';

    $sqlaverage = "SELECT *, MAX(average) FROM `api` INNER JOIN state ON api.stateid=state.stateid";
    $result = $conn->query($sqlaverage);
							if ($result->num_rows > 0) {
								while ($row = $result -> fetch_assoc()) {
            {
                $api_id=$row['api_id'];
                $stateid = $row['stateid'];
                $h1 = $row['h1'];
                $h2 = $row['h2'];
                $h3 = $row['h3'];
                $h4 = $row['h4'];
                $average = $row['average'];
                $date = $row['date'];
                $district = $row['district'];
                $state = $row['state'];
            }
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report and Statistics</title>
</head>
<body>
    
    <div style="margin-left:10%;padding:1px 16px;height:1000px;">
    <h1>Haze Report <?php $state.", ".$district; ?></h1>
    <form action="" method="get">
    <select name="stateid" id="stateid" required="">
				<option>Select Location</option>
				<?php
				$sql = "SELECT * FROM state";
				$result = mysqli_query($conn, $sql);
				while ($row=mysqli_fetch_array($result))
				{
					?>
				<option value="<?php echo $row['stateid'] ?>"><?php echo  $row['state'].", ".$row['district'] ?></option>
				<?php
				}
				?>
            </select>&nbsp;
            <label for="date">Date: </label>
            <input type="date" name="date" id="date">

            <label for="condition">Haze type :</label>
            <select name="condition" id="condition" required>
                <option>Select Air Quality</option>
                <option value="50">Good</option>
                <option value="51">Moderate</option>
                <option value="101">Unhealthy</option>
                <option value="210">Very Unhealthy</option>
                <option value="300">Hazardous</option>
            </select>

            <input type="submit" name="check" id="check">
    </form>
    <?php
        if (isset($_GET['check'])) {
            $stateid2 = $_GET['stateid'];
            $date2 = $_GET['date'];
            $condition = $_GET['condition'];

            if ($condition < 50) {
                $condition2 = 0;
                echo $condition;    
                $sql="SELECT * FROM `api` WHERE stateid = '$stateid2' AND average BETWEEN '$condition2' AND '$condition'";
                $result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while ($row2 = $result -> fetch_assoc()) {
									$api_id3= $row2['api_id'];
									$date3 = $row2['date'];
                                    $stateid3=$row2['stateid'];
                                    echo $api_id3;
                                    ?>
                                    <body>
                                    <div style="margin-left:10%;padding:1px 16px;height:1000px;">
                                    <label for="Location">Location</label>&nbsp; <?php echo $row['state'].", ".$row['district']; ?>
                                    </div>

                                    
                                    </body><?php
            }
        }
    }
}
            ?>
   


    </div>
    
</body>
</html>