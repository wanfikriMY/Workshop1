<?php
    require 'db.php';
    include 'navbar.php';
    include 'function.php';

    if (isset($_GET['service'])) {
		$carid = $_GET['service'];
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

  if(isset($_POST['check_data'])){
    $user_id=$_SESSION['mysesi'];
    $centerid=$_POST['centerid'];
    $date=$_POST['date_check'];
    //$check = check($centerid, $date, $time, $endtime);
    $carid2 = $_GET['service'];
    $check =0;
    

    if($check !=1){
      //INSERT INTO `reservation` (`reservationid`, `centerid`, `user_id`, `plate`, `date`, `start_time`, `end_time`, `status`) VALUES ('1', '2', '960603085997', '0', '2019-12-11', '14:00:00', '16:00:00', 'Pending');
      $reserve="INSERT INTO `reservation` (`reservationid`, `centerid`, `user_id`, `plate`, `date`, `start_time`, `end_time`, `status`) VALUES (NULL, '$centerid', '$user_id', '$carid2', '$date', NULL, NULL, 'Pending')";

      if (!mysqli_query($con,$reserve)) {
        echo "<script>alert ('Register Unsuccessfully!') </script>";
      }else{
        echo "<script>alert ('Register Successfully!') </script>";
      }
  }
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>E-Car Service System</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
  <form method="POST" action="reservation.php">
        <h1>Service Your <?php echo $plate;   ?></h1>
        <label for='cartype'>Car Type :</label>
        <input type="text" disabled="" require="" value="<?php echo $type; ?> "> &nbsp;&nbsp;
        <label for="carmanufacturer">Manufacturer:</label>
        <input type="text" name="carmanufacturer" disabled="" value="<?php echo $manufacturer; ?>"> &nbsp;&nbsp;
        <label for="model">Model :</label>
        <input type="text" disabled="" require="" value="<?php echo $model; ?>"> &nbsp;&nbsp; <br><Br>

        <label for="selectdate">Reserve Date :</label>
        <input type="date" require="" name="date_check" ><br><br>

        <label for="time_check">Select Time :</label>
        <select name="time_check" require="">
            <option value="10:00:00">10:00 AM</option>
            <option value="12:00:00">12:00 PM</option>
            <option value="14:00:00">02:00 PM</option>
            <option value="16:00:00">04:00 PM</option>
        </select><br><br>

        <label for="servicecentre">Service Centre :</label>
        <select name="centerid" require="">
          <option>- Select -</option>
           <?php
            $res=mysqli_query($con,"SELECT * FROM `servicecenter`");
            while($row=mysqli_fetch_array($res))
            {
              ?>
          <option value="<?php echo $row['centerid'] ?>"><?php echo $row['centerid']?> <?php echo $row['distrinct'] ?> <?php echo $row['hangername'] ?></option>
          <?php
            }
          ?>
        </select><br><br>
        <label for="radio">Select Package :</label><br>
        <input type="radio" name="radio" value="package A"><b>Package A</b> (Full Service) RM 350 + Service Charge <br>
        <input type="radio" name="radio" value="package B"><b>Pakage B</b> RM 250 + Service Charge<br>
        <input type="radio" name="radio" value="package C"><b>Package C</b> RM 150 + Service Charge<br><br>

        <input type="text" name="carid" value="<?php echo $carid; ?> "  disable="" hidden>
        <button type="submit" name="check_data">Reserve</button>
  </form>
  <style>
    label{
      display:inline-block;
      width: 140px;
      text-align:centre;
    }
  </style>


</body>
</html>