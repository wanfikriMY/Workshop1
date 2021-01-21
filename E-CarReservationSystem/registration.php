<?php
    require 'db.php';
    $icnumber = $_POST['icnumber'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];



$sql = "INSERT INTO user (user_id,username,email,password,level) VALUES ('$icnumber','$username','$email','$password','user')";

if (!mysqli_query($con,$sql)) {
	echo "<script>alert ('Register Unsuccessfully!') </script>";
}else{
	echo "<script>alert ('Register Successfully!') </script>";
}

header("refresh:0;url = index.php");

?>