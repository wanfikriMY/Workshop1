<?php
	require 'db.php';

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "DELETE FROM user WHERE user_id = '$id'";
		if (!mysqli_query($con,$sql)) {
	echo "<script>alert ('Delete Unsuccessfully!')" ;
}else{
	echo "<script>alert ('Delete Successfully!') </script>" ;
}
	}
header("refresh:0;url = userlist.php");
?>