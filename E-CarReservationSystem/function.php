<?php
require 'class.php';
require 'db.php';

function check($centerid, $date, $time){
    Database::initialize();
    $sql5 = "SELECT DISTINCT(reservationid) FROM reservation WHERE `date` = '$date' AND start_time = '$time' AND centerid = '$centerid' ";
    $result5 = Database::$con->query($sql5);
        
        $num_row5 = mysqli_num_rows($result5);
        $row5= mysqli_fetch_array($result5);
        if($num_row5 == 1){
          return $num_row5;
        }
          else{
  
          }
        
  } 

?>