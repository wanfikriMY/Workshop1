<?php
include 'connection.php';
include 'navbarhome.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div style="margin-left:10%;padding:1px 16px;height:1000px;">
	<h1> <center>Welcome to Air Quality Monitoring System</center></h1>
<hr>
	<table id="service" class="table table-hover" style="width:100%">
	<thead>
						<tr>
						<th>Date</th>
							<th>State</th>
							<th>Distrinct</th>
							<th>H1</th>
							<th>H2</th>
							<th>H3</th>
							<th>H4</th>
							<th>API Average</th>
						</tr>
						</thead>
						<tbody>


							<?php 

$sql = "SELECT * FROM `api` INNER JOIN state ON api.stateid=state.stateid" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		$api_id= $row['api_id'];
		$date = $row['date'];
		$state=$row['state'];
		$district=$row['district'];
		$h1 = $row['h1'];
		$h2 = $row['h2'];
		$h3 = $row['h3'];
		$h4 = $row['h4'];
		$average = $row['average'];
							?>

						</tr>
					
						<tr>
						<td style="text-align: center;"><?php echo $date; ?></td>
							<td style="text-align: center;"><?php echo $state; ?></td>
							<td style="text-align: center;"><?php echo $district; ?></td>
							<td style="text-align: center;"><?php echo $h1; ?></td>
							<td style="text-align: center;"><?php echo $h2; ?></td>
							<td style="text-align: center;"><?php echo $h3; ?></td>
							<td style="text-align: center;"><?php echo $h4; ?></td>
							<td style="text-align: center;"><?php echo $average; ?></td>
						</tr>

						<?php

              				}
              			}
              			else{
            			?>
            			<?php
            				}

			?>
			</tbody>
			<tfoot></tfoot>

				</table><br>


	<a href="loginuser.php">login here</a>
</div>

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