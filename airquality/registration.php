<?php
include('connection.php');
?>

<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	$phoneno=$_POST['phoneno'];
	$icnumber=$_POST['icnumber'];


  

        $sql = "Insert Into user (username,password,phoneno,icnumber,role) VALUES ('$username','$password','$phoneno','$icnumber','admin')";
    $z=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if ($z)
    {
        echo"<script>
        alert('You have been successfully registered !');
        location.href='loginuser.php';
        
        </script>";
    } 
	
	

?>