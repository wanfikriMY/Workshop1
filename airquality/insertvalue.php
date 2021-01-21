<?php
include('connection.php');
include 'navbaruser.php';



if (isset($_POST['update'])) {

/*	$result = mysqli_query($conn,"SELECT * FROM api WHERE state = '$location' and date = '$date'");
if ($result->num_rows > 0 ) {
	while($row = $result -> fetch_assoc()){
		$a1 = $row['mothername'];
		$location = $row['location'];
		$date = $row['date'];
		$h11 = $_row['h1'];
		$h22 = $_row['h2'];
		$h33 = $_row['h3'];
		$h44= $_row['h4'];
			}
		}
		*/
	$date = $_POST['date'];
	$h1 = $_POST['h1'];
	$h2 = $_POST['h2'];
	$h3 = $_POST['h3'];
	$h4 = $_POST['h4'];
	$stateid = $_POST['stateid'];
	$average = ($h1+$h2+$h3+$h4)/4;

	$sql = "INSERT INTO `api`(`date`, `h1`, `h2`, `h3`, `h4`, `api_id`, `stateid`,`average`) VALUES ('$date','$h1','$h2','$h3','$h4',NULL ,'$stateid', '$average')";
    $z=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if ($z)
    {
        echo"<script>
        alert('Data has been update !');
        location.href='insertvalue.php';
        
        </script>";
    } 


}



?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="margin-left:10%;padding:1px 16px;height:1000px;">
			<form class="form-horizontal" method="post" action="">
			<div align="center">
				<h1>Update API Value</h1>
			</div>

			<fieldset>
			<br>
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="location">Location : </label> 	

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
			</select>
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="date">Date :</label>
				<input id="date" name="date" type="date" placeholder="" class="form-control input-md" required="" align="center" >
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h1</label>
				<input id="h1" name="h1" type="text" placeholder="" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h2</label>
				<input id="h2" name="h2" type="text" placeholder="" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h3</label>
				<input id="h3" name="h3" type="text" placeholder="" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h4</label>
				<input id="h4" name="h4" type="text" placeholder="" class="form-control input-md"  align="center">
			</div><br>

			<div class="col-md-5" align="right">
				<input type="submit" name="update" class="btn btn-success " value="Update!">
			  </div>


			</fieldset>
		</form>




	<a href="insertstate.php">Insert State</a><br><br>
	<a href="test.php">Back to main page</a>
</div>

</body>
</html>