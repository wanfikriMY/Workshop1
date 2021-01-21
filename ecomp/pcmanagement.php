<?php 
	require 'db.php';
  include 'include/navbaradmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
		<div>
			<div class="container" align="center">
				<h1>E-Comp Reservation System</h1><br>
				<fieldset>
				<h2>Manage PC</h2>
				<table id="service" class="table table-hover" style="width:100%">
        <thead>
            <tr>
              
                <th>PC ID</th>
                <th>PC Type</th>
				<th>Action</th>
               
                </tr>
                </thead>
        <tbody>
                
 
            <?php
                
				$sql = "SELECT pc_id, pc_type FROM `pc` ";
				$result1 = $con->query($sql);
              if($result1->num_rows > 0){
              while($row1 = $result1->fetch_assoc()){

                $pc_id = $row1['pc_id'];
                $pc_type = $row1['pc_type'];
               
                

                 ?>
                
                <tr>
        
            <td style="text-align: center;"><?php echo $pc_id; ?></td>
            <td style="text-align: center;" class="text-red"><?php echo $pc_type; ?></td>
            
            
            <td style="text-align: center;">
            
			<a class="btn btn-success" href="updatepc.php?update=<?php echo $pc_id; $update=$pc_id; ?>">Update</a>
			<a class="btn btn-success" href="deletepc.php?delete=<?php echo $pc_id; $delete=$pc_id; ?>">Delete</a></td>
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
				<form action="" method="post">
	
					<br><br><br>
					<font color="black">Add Pc</font> <a href="addpc.php">here </a>



			</div>
		</div>
		

</body></fieldset>

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
