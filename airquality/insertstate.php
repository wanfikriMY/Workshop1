<?php
	require 'connection.php';
	include 'navbaruser.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="margin-left:10%;padding:1px 16px;height:1000px;">

	<form class="form-horizontal" method="post" action="stateinsert.php">
		<h1><center>Enter State and District</center></h1>
			<fieldset>


			<div align="center">
			</div>

			<br>
			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="State">State :</label>  
			  <input id="State" name="State" type="text" placeholder="Melaka" class="form-control input-md" required="" align="right">	
			</div><br>

				<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="district">District :</label>  
			  <input id="district" name="district" type="text" placeholder="Ayer Keroh" class="form-control input-md" required="" align="right">	
			</div><br>
				
			  <div class="col-md-5">
				<input type="submit" name="lgn" class="btn btn-success " value="Confirm">
			  </div>
			</div>
			</fieldset>
		</form>

</div>
</body>
</html>