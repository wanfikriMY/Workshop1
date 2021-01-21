<?php
include 'db.php';
if(isset($_POST['login'])){

	$id=$_POST['icnumber'];
	$password = $_POST['password'];
  
	$res = $con->query("SELECT * FROM user where user_id='$id' and password='$password'");
	$row = $res->fetch_assoc();
  
	$user = $row['user_id'];
	$name = $row['username'];
	$pass = $row['password'];
	$email = $row['email'];
	$type = $row['level'];
  
	if($user==$id && $pass=$password){
	  session_start();
	  if($type=="admin"){
		$_SESSION['id']=$user;
		
		$_SESSION['mytype']=$type;
		echo"<script>alert('Just Logged In This System As ADMIN');</script>";
		echo "<script>window.location.assign('admin/home.php')</script>";
	  } else if($type=="user"){
  
		$_SESSION['mysesi']=$user;
		
		$_SESSION['mytype']=$type;
		echo"<script>alert('".$_SESSION['mysesi']." You Just Logged In The System');</script>";
		echo "<script>window.location.assign('home.php')</script>";
	  } else{
  
  
		echo'<script>alert("Wrong Credential");</script>';  

	  }
	} else{

		echo '<script>alert("Enter Correct Username or Password !");</script>';
		header("refresh:0;url = index.php");
  
	}
  }


?>