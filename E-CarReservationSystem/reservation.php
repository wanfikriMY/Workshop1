<?php
    require 'db.php';
    include 'navbar.php';
    include 'function.php';

  
    $user_id=$_SESSION['mysesi'];
    $centerid=$_POST['centerid'];
    $date=$_POST['date_check'];
    $time = DATE($_POST['time_check']);
    $check = check($centerid, $date, $time);
    $carid2 = $_POST['carid'];
    $package = $_POST['radio'];
    $carmanufacturer = $_POST['carmanufacturer'];
  
    

    if($check !=1){
      if($package == "package A")
      {
        $total = 350;
      }
      if($package == "package B")
      {
        $total = 250;
      }
      if($package == "package C")
      {
        $total = 150;
      }

      //INSERT INTO `reservation` (`reservationid`, `centerid`, `user_id`, `plate`, `date`, `start_time`, `end_time`, `status`) VALUES ('1', '2', '960603085997', '0', '2019-12-11', '14:00:00', '16:00:00', 'Pending');
      $reserve="INSERT INTO `reservation` (`reservationid`, `centerid`, `user_id`, `carid`, `date`, `start_time`, `status`, `package`, `total`) VALUES (NULL, '$centerid', '$user_id', '$carid2', '$date', '$time', 'Pending', '$package', '$total')";

      if($con->query($reserve)== TRUE){
        echo"<script>alert('Booked And wait for approval');</script>";
        echo "<script>window.location.assign('userreservation.php')</script>";
        }
        $error ="<script>alert('Failed To Save !');</script>";
        return $error;
      }else{
        echo "<script>alert('Slot already Booked! Please select another date and time.');</script>";
        echo "<script>window.location.assign('home.php')</script>";
      }
    
    echo $check;
    echo $user_id;
    echo $centerid;
    echo $date;
    echo $carid2;
    echo $time;
    echo $check;


?>