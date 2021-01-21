<?php
    include 'db.php';
    include 'navbar.php';

    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE `user_id` = $_SESSION[mysesi]");
    if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$userid = $row['user_id'];
			$username = $row['username'];
			$email = $row['email'];
			$password =$row['password'];
		}
    }


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
</head>
<body>
    <h1><?php echo $username; ?> Details</h1>
    <b>Name             :</b><?php echo $username; ?> <br><br>
    <b>User ID          :</b><?php echo $userid; ?> <br><br>
    <b>Email Address    :</b><?php echo $email; ?> <br><br><br>

    <font color="Black">Reset Password?</font> <a href="resetpassword.php">Reset here </a>

    
</body>
</html>