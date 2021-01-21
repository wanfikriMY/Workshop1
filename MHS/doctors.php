<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="tablestyle.css">
		<link rel="stylesheet" href="mystyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>
	<div class="solid">
        <h2><center>DOCTORS' LIST </center></h2>
    </div>
	<br>
	<div class="container home">
		<table id="data_table" class="table table-striped" style="width: 100%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Room Number</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$resultQuery = mysqli_query($con, "SELECT * FROM `doctor`") or die("Database Error! :" . mysqli_error($con));
				while ($row = mysqli_fetch_assoc($resultQuery)) {
				?>
					<tr id="<?php echo $row['doc_id']; ?>">					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['roomNo']; ?></td>
					<td><input type="submit" value="Edit" onclick="window.location.href='edit-doctor.php?id=<?php echo $row['doc_id']; ?>'"></td></tr>

				<?php
				}
				?>
			</tbody>
		</table>
		<br>
		<input type="submit" value="Add Doctors" onclick="window.location.href='register-doctors.php'">
	</div>
</body>
<script>
</script>

</html>