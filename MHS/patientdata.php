<?php
include "connection.php";
include "adminnavbar.html";
include "sessionAdmin.php";
include "footer.html";

?>

<!DOCTYPE html>
<html>

<head>
	<title>PATIENT'S DATA</title>
	<link rel="stylesheet" href="tablestyle.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<style type="text/css">
	 body
    {
      font-family:'Handlee',cursive;
      margin:0;
      background-image: url('img/bg.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: 100% 100%;
      box-sizing: border-box;
      overflow: hidden;
      display: grid;
      height: 100%;
      padding: 0;
  }

  div.solid 
    {
      
      color:white;
      background-color: rgba(0,0,0,0.5);
      width: 1470px;
               border: 1px;
        padding: 15px;
        margin: 10px; 
    }

</style>

<body>
	<div class="solid">
        <h2><center> PATIENTS' DATA </center></h2>
    </div>
	<br>
	<div class="solid">
	<table class="active" id="service" style="width: 100%">
		<thead>
			<tr>
				<th>Patient Id</th>
				<th>Patient Name</th>
				<th>Medical History</th>
				<th>Date</th>
				<th>Test</th>
				<th>Result</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM `patientdata` INNER JOIN patient on patientdata.patient_id = patient.patient_id";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$patientID = $row['patient_id'];
					$history = $row['medical_history'];
					$date = $row['date'];
					$remark = $row['result'];
					$name = $row['name'];
					$test = $row['test'];

			?>
					<tr>
						<td><?php echo $patientID; ?></td>
						<td><a><?php echo $name; ?></a></td>
						<td><?php echo $history; ?></td>
						<td><?php echo $date; ?></td>
						<td><?php echo $test; ?></td>
						<td><?php echo $remark; ?></td>
					</tr>
				<?php
				}
			} else {
				?>
			<?php
			}
			?>
		</tbody>
		<tfoot>

		</tfoot>

	</table>
</body>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
		$('#vehicle').DataTable();
	});
	$(document).ready(function() {
		$('#example').DataTable();
		$('#service').DataTable();
	});
</script>
</div>
</html> 