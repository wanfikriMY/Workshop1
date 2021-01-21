<?php
	require 'db.php';
	include 'include/navbaruser.php';

	include_once 'include/function.php';

	if (!isset($_SESSION['mysesi']) && !isset($_SESSION['id']) )
	{
	 // echo "<script>window.location.assign('index.php')</script>";
		
	}
	
	
if(isset($_POST['check_data'])){
	$id = $_SESSION['mysesi'];
    $pc_id= $_POST['pc_id'];
    $date = $_POST['date_check'];
    $time = DATE("H:i:s", STRTOTIME($_POST['time_check']));
	$endTime = date('H:i:s',strtotime($time . ' +120 minutes'));
    $check = check($pc_id, $date, $time, $endTime);

    if($check != 1){
     
      
       $sql4 = "INSERT INTO `reservation` (`reservation_id`, `pc_id`, `user_id`, `reservation_date`, `start_time`, `end_time`, `status`) VALUES (NULL, '$pc_id', '$id', '$date', '$time', '$endTime', 'Not Approved');";
      
      
                    if($con->query($sql4)== TRUE){
                     echo"<script>alert('Pc $lab_id Booked And wait for approval');</script>";
                     echo "<script>window.location.assign('reservepage.php')</script>";
                     }
                     $error ="<script>alert('Failed To Save !');</script>";
                      return $error;
      }else{
          echo "<script>alert('Pc already Booked !');</script>";
      }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
</head>
<body>
	<div class="container" align="center">
		<h1>E-Comp Reservation System</h1>
	</div>
	<div class="content">
		<div class="form">
		
				<fieldset>
					<div align="center">
						<h2>Make Your Reservation Here</h2>
						
						
<form method="POST">


Date:&nbsp; &nbsp;<input type="date" name="date_check" required="" ><br><br>

Time:&nbsp; &nbsp;
<select name="time_check" required="">
  <option value="10:00:00">10:00 AM</option>
  <option value="12:00:00">12:00 PM</option>
  <option value="14:00:00">02:00 PM</option>
  <option value="16:00:00">04:00 PM</option>
</select>
<p><small align="center">Every session is 2 hours usage time.</small></p>

PC:&nbsp; &nbsp; <select  class="form-control" name="pc_id" required="">
		   <option >- Select -</option>
		 <?php $res=mysqli_query($con,"SELECT  `pc_id` ,`pc_type` FROM `pc`");
			  while($row=mysqli_fetch_array($res))
			  {
				  ?>
			  <option  value="<?php echo $row['pc_id']?>" > <?php echo $row['pc_id']?> <?php echo $row["pc_type"];?></option>
			  <?php
			  }
		 ?>
		 </select><br>
<br><button type="submit" name="check_data">Reserve</button>
</form> 
					</div>
				</fieldset>
		
			
		</div>
		

	</div>
<style>
	label {
  display: inline-block;
  width: 140px;
  text-align: center;
}​
</style>
</body>
</html>