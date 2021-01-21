<?php
	require('db.php');

	if(isset($_GET['delete'])){
		$carid = $_GET['delete'];
		$sql = "DELETE FROM car WHERE carid = '$carid'";
		if (!mysqli_query($con,$sql)) {
	echo "<script>alert('Delete Failed!') </script>";
}else{
	echo "<script>alert('Delete Successfully!')</script>";
}
	}
header("refresh:0;url = home.php");
?>
