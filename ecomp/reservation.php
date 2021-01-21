<?php
require 'db.php';
include 'include/navbaradmin.php';

if(isset($_GET['reservation_id'])){

    $reservation_id = $_GET['reservation_id'];
  
    $sql = "UPDATE `reservation` SET `status` = 'Approved' WHERE `reservation`.`reservation_id`=$reservation_id;";
  
   
   if($con->multi_query($sql) === TRUE){

       echo"<script>alert('Successfully Update');</script>";
       echo "<script>window.location.assign('reservation.php')</script>";
   }
   else{
       echo'<h5 class="text-red">Failed To Update</h5>';
   }
   


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Comp Reservation System</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </head>
  <body>
    <h1 align="center">E-Comp Reservation System</h1>
  <p>
</p>


  <fieldset>
  <div class="container">
    <?php
    
    ?>
       <br>
       <h1 align="center">Reservation Information</h1>
       <hr>
      <table id="service" class="table table-hover" style="width:100%">
        <thead>
            <tr>
              
                <th>User</th>
                <th>PC Type</th>
                <th>Time</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
        <tbody>
                
 
            <?php
                
				$sql = "SELECT reservation_id, user_id, pc_type, reservation_date, start_time, end_time, status FROM `reservation` INNER JOIN pc ON reservation.pc_id=pc.pc_id ";
				$result1 = $con->query($sql);
              if($result1->num_rows > 0){
              while($row1 = $result1->fetch_assoc()){

                $reservation_id = $row1['reservation_id'];
                $user_id = $row1['user_id'];
                $reservation_date = $row1['reservation_date'];
                $start_time = $row1['start_time'];
                $end_time = $row1['end_time'];
                $pc_type = $row1['pc_type'];
                $status = $row1['status'];
                

                 ?>
                
                <tr>
        
            <td style="text-align: center;"><?php echo $user_id; ?></td>
            <td style="text-align: center;" class="text-red"><?php echo $pc_type; ?></td>
            <td style="text-align: center;" class="text-red"><?php echo $start_time; ?> - <?php echo $end_time; ?> </td>
            <td style="text-align: center;" class="text-red"><?php echo $reservation_date; ?></td>
            <td style="text-align: center;" class="text-red"><?php echo $status; ?></td>
            
            <td style="text-align: center;">
            <a href="reservation.php?reservation_id=<?php echo $reservation_id; ?>" class="button button4 button-sm">&#9745;</a>
    </tr>
              <?php
              }
            }
            else
              {
        
            ?>
            
           <?php

            }
            ?>
            
        </tbody>
        <tfoot>
            
        </tfoot>
      </table>

   
     
  </div>
</fieldset>

  </body>
</html> 
<script>
    $(document).ready(function() {
    $('#example').DataTable();
         $('#vehicle').DataTable();
} );
$(document).ready(function() {
    $('#example').DataTable();
         $('#service').DataTable();
} );
    


</script>
