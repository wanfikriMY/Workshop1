<?php
    include 'connection.php';

    if (isset($_GET['delete'])) {
        $api_id = $_GET['delete'];

        $sql = "DELETE FROM api WHERE api_id = '$api_id'";
        if (!mysqli_query($conn,$sql)) {
            echo "<script>alert('Delete Failed)</script> ";
            header("refresh:0;url = home.php");
  
        }else{
            echo "<script>alert('Delete Successfully')</script>"; 
            header("refresh:0;url = home.php"); 
        }
    }

?>