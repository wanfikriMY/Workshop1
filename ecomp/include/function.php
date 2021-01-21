<?php
require 'class.php';

function check($pc_id, $date, $time, $endTime){
    Database::initialize();
  //SELECT * FROM Products WHERE (Price BETWEEN 10 AND 20 )AND NOT CategoryID IN (1,2,3);
    $sql5 = "SELECT DISTINCT(reservation_id) FROM reservation WHERE reservation_date = '$date' AND start_time = '$time' AND end_time='$endTime' AND pc_id=$pc_id ";
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