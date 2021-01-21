<?php
	require 'connection.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Air Quality Monitoring System</title>
</head>
<body>
	<div class="container" align="center">
	  <h1>Air Quality Monitoring System</h1>
	  </div>	
	<div class="content">
		<div class="form">
		<form class="form-horizontal" method="post" action="registration.php">
			<fieldset>


			<div align="center">
				<h2>Register Your Account Here</h2>
			</div>

			<br>
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="icnumber">IC Number</label>  
			  <input id="icnumber" name="icnumber" pattern="[0-9]{12}" type="text" placeholder="991209106173" class="form-control input-md" required="" align="right">	
			</div><br>
				
			
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="" align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
			</div><br>
			
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="phoneno">Phone Number</label>
				<input id="phoneno" name="phoneno" type="text" placeholder="" class="form-control input-md" required="">
			</div><br>

			<div class="form-group"  align="center">
			  <label class="col-md-4 control-label" for="login"></label>
			  <div class="col-md-5">
				<input type="submit" name="lgn" class="btn btn-success " value="Register!">
			  </div>
			</div>
			</fieldset>
		</form>
		<font color="grey">Already have an account?</font> <a href="loginuser.php">Login here </a>
		</div>	
		</div>
	</div>
</body>
</html>