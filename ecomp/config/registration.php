<?php
	require 'db.php';

$icnumber = $_POST['icnumber'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO user (user_id,username,email,password,status) VALUES ('$icnumber','$username','$email','$password','user')";

if (!mysqli_query($con,$sql)) {
	echo "Registered Failed!";
}else{
	echo "Registered Successfully!";
}

header("refresh:2;url = index.php");
?>
