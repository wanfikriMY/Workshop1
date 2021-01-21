<?php
	require('db.php');

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "DELETE FROM pc WHERE pc_id = '$id'";
		if (!mysqli_query($con,$sql)) {
	echo "<script>alert('Delete Failed!') </script>";
}else{
	echo "<script>alert('Delete Successfully!')</script>";
}
	}
header("refresh:0;url = pcmanagement.php");
?>
