<?php
	require 'connection.php';
    include 'navbaruser.php';
    
    if (isset($_GET['api'])) {
        $api_id = $_GET['api'];
    }

    $sqlget = "SELECT * FROM `api` INNER JOIN state ON api.stateid=state.stateid WHERE `api_id`=$api_id";
    $resultget = $conn->query($sqlget);
							if ($resultget->num_rows > 0) {
								while ($row = $resultget -> fetch_assoc()) {
                                    $api_id= $row['api_id'];
                                    $stateid=$row['stateid'];
									$date = $row['date'];
									$state=$row['state'];
									$district=$row['district'];
									$h1 = $row['h1'];
									$h2 = $row['h2'];
									$h3 = $row['h3'];
                                    $h4 = $row['h4'];
                                }
                            }

    if (isset($_POST['update'])) {
        $h11=$_POST['h1'];
        $h22=$_POST['h2'];
        $h33=$_POST['h3'];
        $h44=$_POST['h4'];
        $tateid2=$stateid;
		$api_id2=$api_id;
		$average = ($h11+$h22+$h33+$h44)/(4);

        $sqlupdate = "UPDATE `api` SET `date`='$date',`h1`='$h11',`h2`='$h22',`h3`='$h33',`h4`='$h44', `average`='$average' WHERE `api_id` = '$api_id'";
        $z=mysqli_query($conn,$sqlupdate);
        if($z)
        {
            echo"<script>
            alert('Data has been update !');
            location.href='home.php';
            </script>";
        }else{
            echo "<script>
            alert('Data update Failed! !');
            </script>";
        }
    
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="margin-left:10%;padding:1px 16px;height:1000px;">
			<form class="form-horizontal" method="post" action="">
			<div align="center">
				<h1>Update API Value</h1>
			</div>

			<fieldset>
			<br>
			<div class="form-group" align="center">
                <b>Location :   </b><?php echo $api_id.", ".$state.", ".$district?>
			</div><br>

			<div class="form-group" align="center">
               <b>Date :    </b> <?php echo $date ?>
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h1</label>
                <input id="h1" name="h1" type="text" placeholder="" value="<?php echo $h1 ?>" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h2</label>
				<input id="h2" name="h2" type="text" placeholder="" value="<?php echo $h2 ?>" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h3</label>
				<input id="h3" name="h3" type="text" placeholder="" value="<?php echo $h3 ?>" class="form-control input-md"  align="center">
			</div><br>

			<div class="form-group" align="center">
			  <label class="col-md-4 control-label" for="username">h4</label>
				<input id="h4" name="h4" type="text" placeholder="" value="<?php echo $h4 ?>" class="form-control input-md"  align="center">
			</div><br>

			<div class="col-md-5" align="right">
				<input type="submit" name="update" class="btn btn-success " value="Update!">
			  </div>


			</fieldset>
		</form>
</div>

</body>
</html>