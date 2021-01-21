<?php
	require 'db.php';
	include 'include/navbaradmin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Comp Reservation System</title>
</head>
<body>
	<div class="container" align="center">
		<h1>E-Comp Reservation System</h1>
	</div>
	<div class="content" align="center">
		<fieldset>
			<h2>User List & Management</h2><br>
			<h3>User</h3>
			<table class="table" id="table_user" style="width: 100% ">
				<tr class="table_primary">
					<th class="active" style="text-align: center;"><b>User ID</b></th>
					<th class="active" style="text-align: center;"><b>User Name</b></th>
					<th class="active" style="text-align: center;"><b>User Email</b></th>
					<th class="active" style="text-align: center;"><b>Status</b></th>

					<?php
							$sql = "SELECT * FROM `user`";
							$result = $con->query($sql);

							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$username = $row['username'];
									$userid = $row['user_id'];
									$useremail = $row['email'];
									$status = $row['status'];
								

							

					?>
				</tr>
				<td style="text-align: center;"><?php echo $userid ?></td>
				<td style="text-align: center;"><?php echo $username ?></td>
				<td style="text-align: center;"><?php echo $useremail ?></td>
				<td style="text-align: center;"><?php echo $status ?></td>
				<td  style="text-align: center;"><a class="btn btn-success" href="deleteuser.php?delete=<?php echo $row['user_id']; $delete=$row['user_id'] ?>">Delete</a></td>


				
				 <?php

              }

            }
            else
              {
            ?>
            
            <?php

            }

            ?>
			</table>
			<br><br><br><br>
			

			<!-- <h3>Admin</h3>
			<table class="table" style="width: 100%" id="table_admin">
				<tr class="table_primary">
					<th class="active" style="text-align: center;"><b>Admin ID</b></th>
					<th class="active" style="text-align: center;"><b>Admin Name</b></th>

					<?php
							$sql2 = "SELECT * FROM `admin`";
							$result2 = $con->query($sql2);

							if ($result2->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$adminname = $row['admin_name'];
									$admin_id = $row['admin_id'];
									}}			
					?>
				</tr>
				<td style="text-align: center;"><?php echo $admin_id; ?></td> -->
				
			</table>
			<font color="black">Add User</font> <a href="adduser.php">here </a>


		</fieldset>
		
	</div>


</body>
<style> table, th, td {
    border: 1px solid black;
}	
</style>
</html>