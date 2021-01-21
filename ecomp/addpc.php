<?php
require 'db.php';
include 'include/navbaradmin.php';
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
				<h2>Add Pc</h2>

				<form class="form-horizontal" method="post" action="add.php">
					<!-- <div class="form-group">
			  <label class="col-md-4 control-label" for="pcname">PC Name</label>  
			  <div class="col-md-5">
			  <input id="pcname" name="pcname" type="text" placeholder="PC Name" class="form-control input-md" required="">	
			  </div><br>
			</div> -->

					<div class="form-group">
						<label class="col-md-4 control-label" for="pctype">PC Type</label>
						<div class="col-md-5">
							<input list="type" id="pctype" name="pctype" placeholder="Multimedia" class="form-control input-md" required="">
							<datalist id="type">
								<option value="Multimedia">
								<option value="Programming">
								<option value="Surfing Internet">
								<option value="Typing and Office">
								<option value="Others">
							</datalist>
						</div>
					</div><br>
					<input type="submit" name="lgn" class="btn btn-success " value="Add PC">




		</div>

	</div>
	</fieldset>
</body>
<style>
	table,
	th,
	td {
		border: 1px solid black;
	}
</style>

</html>