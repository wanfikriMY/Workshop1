<?php
require 'db.php';

$typepc = $_POST['pctype'];
$namepc = $_POST['pcname'];


$sql = "INSERT INTO `pc` (pc_type) VALUES ('$typepc')";

if (!mysqli_query($con,$sql)) {
	echo "<script>alert('Add Failed!')</script>";
}else{
	echo "<script>alert('Add Successfully!')</script>";
}

header("refresh:0;url = pcmanagement.php");
?>
