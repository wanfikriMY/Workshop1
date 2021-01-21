<?php
	require 'db.php';
	include 'include/navbaradmin.php';

	if (isset($_GET['update'])) {
		$id = $_GET['update'];

	}
		$update = mysqli_query($con,"SELECT * FROM pc WHERE pc_id = '$id'");
		if($update->num_rows > 0){
              while($row = $update->fetch_assoc()){

                   $type = $row['pc_type'];
                   //$name = $row['name'];
               }}

	if(isset($_POST['update'])){
		$typepc = $_POST['pctype'];
		$pcname = $_POST['pcname'];
		


		$sql = "UPDATE pc SET pc_type = '$typepc' WHERE pc_id = '$id'";
		if (!mysqli_query($con,$sql)) {
			echo "<script>alert('Update failed!')</script> ";
			header("refresh:0;url = pcmanagement.php");
		}else{
			echo "<script>alert ('Update Successfully!')</script> ";
			header("refresh:0;url = pcmanagement.php");
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
			<form class="form-horizontal" method="post" action="">
				<fieldset>
					<div align="center">
						<h2>PC Details</h2>
						<table id="table_details" style="width: 50%">
							<th style="text-align: center;"><b>PC ID</b></th>
							<!--<th style="text-align: center;"><b>PC Name</b></th> -->
							<th style="text-align: center;"><b>PC Type</b></th></tr>
							<td style="text-align: center;"><?php echo $id;?></td>
							<!--<td style="text-align: center;"><?php echo $name;?></td> -->
							<td style="text-align: center;"><?php echo $type;?></td>
							
						</table>
						<h2>Enter New PC Details</h2>
					</div><br>
					<!--<div class="form-group" align="center">
						<label class="col-md-4 contol-label" for="pcname">PC Name</label>
						<input type="text" name="pcname" id="pcname"  align="right" placeholder="PC Name">
					</div><br> -->
					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="pctype">PC Type</label>
						<input list="type" name="pctype" id="pctype" required="" align="right" placeholder="PC Type">
						<datalist id="type">
			  				<option value="Multimedia">
			  				<option value="Programming">
			   				<option value="Surfing Internet">
			   				<option value="Typing and Office">
			   				<option value="Others">	
			 		 </datalist>
					</div><br>
					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="update">
						</label>
						<div class="col-md-5">
							<input type="submit" name="update" class="btn btn-success" value="Update">

							<?php


							?>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		
	</div>
	
	<style>
		table, th, td{
			border: 1px solid black;
		}
	</style>

</body>
</html>