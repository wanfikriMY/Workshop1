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
	<h1 align="center">E-Comp Reservation System</h1>
	<fieldset>
		<h2 align="center">Report and Statistic</h2>
    <div align="center">
      <form action = "reporttype.php" method="post">
        <input list="type" id="pc_type" type="text" name="pc_type" placeholder="PC type">
        <datalist id="type">
          <option value="Multimedia">
          <option value="Programming">
          <option value="Surfing Internet">
          <option value="Typing and Office">
          <option value="Others">          
        </datalist>
        <input type="submit" name="reporttypet" value="Generate Report">
      </form><br>
    </div>
		<table id="service" class="table table-hover" style="width:100%">
        <thead>
            <tr>
              
                <th>PC ID</th>
                <!--<th>PC Name</th>-->
                <th>PC Type</th>
				<th>Action</th>
               
                </tr>
                </thead>
        <tbody>
                
 
            <?php
                
				$sql = "SELECT * FROM `pc` ";
				$result1 = $con->query($sql);
              if($result1->num_rows > 0){
              while($row1 = $result1->fetch_assoc()){

                $pc_id = $row1['pc_id'];
                $pc_type = $row1['pc_type'];
                //$pc_name = $row1['name'];
               
                

                 ?>
                
                <tr>
        
            <td style="text-align: center;"><?php echo $pc_id; ?></td>
           	<!--<td style="text-align: center;"><?php echo $pc_name; ?></td>-->
            <td style="text-align: center;"><?php echo $pc_type; ?></td>
            
            
            <td style="text-align: center;">
            
			<a class="btn btn-success" href="reportpc.php?report=<?php echo $pc_id; $report=$pc_id; ?>">Generate Report</a>
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
