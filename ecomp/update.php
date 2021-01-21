<?php
	require 'db.php';

	$pcname = $_POST['pcname'];
	$pctype = $_POST['pctype'];
	

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "INSERT INTO pc WHERE pc_id = '$id' (pc_type, name) VALUES ('$pctype', '$pcname')";
		echo "$id";
	}
	echo "$id";
	?>