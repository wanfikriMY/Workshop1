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
	<div class="container" align="center">
		<h1>E-Comp Reservation System</h1>
	</div>
	<div class="content" align="center">
		<fieldset>
			<h2>Add User</h2>
			<div class="form">
				<form class="form-horizontal" method="post" action="adduserpanel.php"><br>
					<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="icnumber">IC Number</label>  
			  <input id="icnumber" name="icnumber" pattern="[0-9]{12}" type="text" placeholder="960603085997" class="form-control input-md" required="" align="right">	
			</div><br>

			
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Ahmad" class="form-control input-md" required="" align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="email@gmail.com" class="form-control input-md" required="">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
			</div><br>

			<div class="form-group" align="center">
				<label class="col-md-4 control-label" for="adduser"></label>
				<div class="col-md-5">
					<input type="submit" name="adduser" class="btn btn-success" value="Register">
					</div>
				
			</div>

					
				</form>
				
			</div>
		</fieldset>
		
	</div>

</body>
</html>