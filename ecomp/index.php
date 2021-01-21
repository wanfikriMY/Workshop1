<?php
	require 'db.php';
	echo '<script>alert ("Welcome To E-Comp Reservation System! Please Login to continue. If you dont have account, please register first.") </script>' ;
if(isset($_POST['login'])){

	$id=$_POST['icnumber'];
	$password = $_POST['password'];
  
	$res = $con->query("SELECT * FROM user where user_id='$id' and password='$password'");
	$row = $res->fetch_assoc();
  
	$user = $row['user_id'];
	$name = $row['username'];
	$pass = $row['password'];
	$email = $row['email'];
	$type = $row['status'];
  
	if($user==$id && $pass=$password){
	  session_start();
	  if($type=="admin"){
		$_SESSION['id']=$user;
		
		$_SESSION['mytype']=$type;
		echo"<script>alert('Just Logged In This System As ADMIN');</script>";
		echo "<script>window.location.assign('reservation.php')</script>";
	  } else if($type=="user"){
  
		$_SESSION['mysesi']=$user;
		
		$_SESSION['mytype']=$type;
		echo"<script>alert('".$_SESSION['mysesi']." You Just Logged In The System');</script>";
		echo "<script>window.location.assign('reservepage.php')</script>";
	  } else{
  
  
		echo'<script>alert("Wrong Credential");</script>';  

	  }
	} else{

		echo '<script>alert("Enter Correct Username or Password !");</script>';
  
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