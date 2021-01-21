<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";
?>
<?php
	
	$sql = "SELECT test,result,count(id) FROM patientdata WHERE test ='covid' GROUP BY result
";
	$query = $con->query($sql);
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PATIENT'S REPORTS</title>
<link rel="stylesheet" href="mystyle.css">
<style type="text/css">
	.piechart{
	width: 700px; 
	height: 400px;
	 margin-left: auto;
    margin-right: auto; 
}
</style>
</head>
<body>
	<div class="solid">
			<h3>
			<center>PERCENTAGE OF POSITIVE AND NEGATIVE COVID TESTS</center>
		</h3>

	</div>
	<br>
<div class="piechart" 
id="piechart" ></div>
 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">  
	google.charts.load('current', {'packages':['corechart']});  
	google.charts.setOnLoadCallback(drawChart);  
	function drawChart(){  
    var data = google.visualization.arrayToDataTable([  
              	['Gender', 'Number'],  
              	<?php  
	              	while($row = $query->fetch_assoc()){  
	               		echo "['".$row["result"]."', ".$row["count(id)"]."],";  
	              	}  
              	?>  
         	]);  
    var options = {  
          		title: '',  
          		//is3D:true,  
          		pieHole: 0.4  
         	};  
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options);  
}  
</script>
</body>
</html>