<?php
       include 'navbar.php';
       require 'db.php';

 
     if (isset($_GET['reservationid'])) {
         $reservationid = $_GET['reservationid'];
         $sub = $_GET['subtotal'];
         $sqlupdate = "UPDATE `reservation` SET `total`= '$sub',`status`= 'Approve' WHERE reservationid = '$reservationid'";
         if (!mysqli_query($con,$sqlupdate)) {
            echo "<script>alert('Update Failed!')</script>";
        }else{
            echo "<script>alert('Update Successfully!')</script>";
        }
    }
    echo $reservationid; echo $sub;
     
     
       if(isset($_POST['approve'])){
        $subtotal2=$_POST['subtotal2'];

        echo $subtotal2."".$subtotal2;

        $sqlupdate = "UPDATE `reservation` SET `total`='$subtotal2' WHERE `reservationid` = '$reservationid'";
        if(!mysqli_query($con,$sqlupdate)){
            echo "<script>alert('Update Failed!')</script>";
        }else{
            echo "<script>alert('Update Successfully!')</script>";
        }
    }

?>