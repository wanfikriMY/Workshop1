----loginproc.php---
<?php

// Inialize session
session_start();

// Include database connection settings
$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost',                  so you're NOT necessary to change this even this script has already     online on the internet.
$dbname   = 'database'; // Your database name.
$username = 'root';             // Your database username.
$password = '';                 // Your database password. If your database has no         password, leave it empty.

// Let's connect to host
mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed,       perhaps the service is down!');
/ Select the database
mysql_select_db($dbname) or DIE('Database name is not available!');


// Retrieve username and password from database according to user's input

$login = mysql_query("SELECT count(*) FROM members WHERE (
username = '" .       mysql_real_escape_string($_POST['user']) . "') 
and (password = '" .     mysql_real_escape_string(md5($_POST['pass'])) . "')");

// Check username and password match

 if (mysql_num_rows($result) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['user'];
$user = mysql_real_escape_string($_POST['user']);

$status = mysql_query("SELECT * FROM user WHERE username = '$user'")
$result=mysql_fetch_assoc($status);
$stat = $result['status'];
if($stat == 'customer'){
 header('Location: customer.php');
}
elseif($stat == 'admin'){
 header('Location: admin.php');
}
}
else {
// Jump to login page
header('Location:login.php');
}

?>
----login.php---
<html>
<head>
</head>
<body>

<form action="loginproc.php" method="post">




               UserName:<input type="text" name="user" >

   <p> &nbsp;</p>
   Password:<input type="password" name="pass"  >
<p>&nbsp;</p>

  <input type="submit"  value="  Login Here  " >
  &nbsp;
  <span class="style30">| New?</span>
  <a href="signup.php"><span class="style32">Start Here</span>

 </form></body></html>
----customer.php---
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>
<html>

<head>
<title>Secured Page</title>
</head>

<body>

<p>This is secured page with session: <b><?php echo $_SESSION['username']; ?></b>
<br>You can put your restricted information here.</p>
<p><a href="logout.php">Logout</a></p>

</body>

</html>
----admin.php---
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}
$username = $_SESSION['username'];
$status = mysql_query("SELECT * FROM user WHERE username = '$username'")
$result=mysql_fetch_assoc($status);
$stat = $result['status'];

if($stat != 'admin')
{
header('Location: login.php');
}
?>
<html>

<head>
<title>Secured Page</title>
</head>

<body>

<p>This is secured page with session: <b><?php echo $_SESSION['username']; ?></b>
<br>You can put your restricted information here.</p>
<p><a href="logout.php">Logout</a></p>

</body>

</html>
----logout.php---
<?php

  // Inialize session
  session_start();

// Delete certain session
  unset($_SESSION['username']);
  // Delete all session variables
  // session_destroy();

 // Jump to login page
 header('Location: index.php');

  ?>
  -----------------------------------------------------------------------

  if ($num_row == 1) {
      session_start();
      if ($status == 'user') {
      $_SESSION['user'] = $id;
      echo "<script> alert('Log in successfully! Welcome user $nameuser') ;
      location.href = 'pcmanagement.php';
      </script>";
    }elseif ($status == 'admin') {
    $_SESSION['admin'] = $id;
    echo "<script>alert (Log in Successfully! Welcome admin $nameuser);
    location.href = 'pcmanagement.php';</script>";

    }}
    else{
      echo " <script>alert ('Wrong Credentials'); </script>";
    }
  }