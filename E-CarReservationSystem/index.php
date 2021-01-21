<?php
    include 'db.php';
    include 'loginsession.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>E-Car Rerservation System</title>
</head>
<body>
<div class="container" align="center">
		<h1>E-Car Rerservation System</h1>
	</div>
	<div class="content">
		<div class="form">
			<form class="form-horizontal" method="post" action="loginsession.php">
				<fieldset>
					<div align="center">
						<h2>Login Here</h2></div>
					<br>
					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="icnumber">IC Number</label>
						<input id="icnumber" type="text" name="icnumber" class="form-control input-md" required="" align="right"></div><br>

					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="password">Password</label>
						<input type="password" name="password" id="password" placeholder="" required="">
					</div>
					<div align="center">Forgot your password? Reset it <a href="resetpassword.php">here</a>
					</div><br>

					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="login"></label>
						<div class="col-md-5">
							<input type="submit" name="login" class="btn btn-success" value="Login">
						</div>
					</div>
				</fieldset>
			</form>
			<font color="grey">Don't have an acount?</font> <a href="register.php">Register here </a>

</body>
</html>
    
</body>
</html>