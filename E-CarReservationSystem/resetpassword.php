<?php
    include 'db.php';

    if (isset($_POST['reset'])) {
        $icnumber = $_POST['icnumber'];
        $newpassword = $_POST['password'];
        $email = $_POST['email'];

        $sqlget = mysqli_query($con,"SELECT * FROM `user` WHERE `user_id` = '$icnumber'");
        if ($sqlget -> num_rows >0) {
            while($row = $sqlget ->fetch_assoc()){
            $user_id = $row['user_id'];
            $emailget = $row['email'];
            }
        }

        if($icnumber == $user_id && $email == $emailget){
            $sqlreset = "UPDATE `user` SET `password`='$newpassword' WHERE `user_id` = '$icnumber'";
            if (!mysqli_query($con,$sqlreset)) {
                echo "<script>alert('Reset Password Failed!)</script>";
            }else{
                echo " <script>alert('Reset Password Success!)</script>";
                header("refresh:0;url = home.php");
            }
        }
    
    }

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
			<form class="form-horizontal" method="post" action="">
				<fieldset>
					<div align="center">
						<h2>Reset Here</h2></div>
					<br>
					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="icnumber">IC Number</label>
                        <input id="icnumber" type="text" name="icnumber" class="form-control input-md" required="" align="right"></div><br>
                        
                    <div class="form-group" align="center">
						<label class="col-md-4 control-label" for="email">Email Address</label>
						<input id="email" type="text" name="email" class="form-control input-md" required="" align="right"></div><br>

					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="password">New Password</label>
						<input type="password" name="password" id="password" placeholder="" required="">

					<div class="form-group" align="center">
						<label class="col-md-4 control-label" for="login"></label>
						<div class="col-md-5">
							<input type="submit" name="reset" class="btn btn-success" value="Reset">
						</div>
					</div>
				</fieldset>
			</form>


</body>
</html>
    
</body>
</html>