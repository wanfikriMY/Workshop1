<?php
include('connection.php');
?>

<?php
	$State=$_POST['State'];
	$district=$_POST['district'];


  

    $sql = "Insert Into state (state,district) VALUES ('$State','$district')";
    $z=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if ($z)
    {
        echo"<script>
        alert('Your data has been saved !');
        location.href='insertvalue.php';
        
        </script>";
    } 
	
	

?>