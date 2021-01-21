
<?php
	require 'db.php';
	session_start();
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['id']) )
  {
    echo "<script>window.location.assign('index.php')</script>";
  }

  $sqlname = mysqli_query($con, "SELECT username FROM user WHERE user_id = '$_SESSION[id]'");
  if ($sqlname->num_rows > 0) {
    while ($row = $sqlname -> fetch_assoc()){
      $username = $row['username'];
    }
  }


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}


</style>
</head>
<body>

<div class="topnav" align="">
  <a href="home.php">Home Page</a>
  <a href="reservation.php">My Reservation</a>
  <a href="Centre.php">Service Centre</a>
  <a href="../logout.php">Log Out as   <?php echo $username; ?></a>
  	
  </div>
</div>

</body>
</html>
