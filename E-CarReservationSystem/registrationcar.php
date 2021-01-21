<?php
    include 'navbar.php';
    require 'db.php';

    $sql = mysqli_query($con,"SELECT * FROM `user` WHERE user_id = $_SESSION[mysesi] ");
	if ($sql->num_rows > 0) {
		while ($row = $sql -> fetch_assoc()) {
			$userid = $row['user_id'];
		}
	}
    
    $cartype = $_POST['cartype'];
    $numberplate = $_POST['numberplate'];
    $manufacturer = $_POST['manu'];
    $model = $_POST['model'];



$sql = "INSERT INTO car (user_id,plate,type,manufacturer,model) VALUES ('$userid','$numberplate','$cartype','$manufacturer','$model')";

if (!mysqli_query($con,$sql)) {
	echo "<script>alert ('Register Car Unsuccessfully!') </script>";
}else{
	echo "<script>alert ('Register Car Successfully!') </script>";
}

header("refresh:0;url = home.php");

?>