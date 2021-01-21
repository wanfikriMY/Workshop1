<?php
include 'connection.php';
session_start();
if (isset($_GET['session'])) {
    $_SESSION['id'] = $_GET['session'];
    $_SESSION['type'] = "patient";
}
include "usernavbar.html";
include "footer.html";
//include "sessionPatient.php";

if (isset($_POST['reset'])) {
    $newpassword = $_POST['newpassword'];
    $pass = $_POST['pass'];

    $sqlresult = mysqli_query($con, "SELECT `password` from patient where patient_id = '$_SESSION[id]'");
    while ($row = mysqli_fetch_assoc($sqlresult)) {
        $curr = $row['password'];
    }

    if ($pass == $curr) {
        mysqli_query($con, "UPDATE `patient` SET `password`= '$newpassword' WHERE `patient_id` = '$_SESSION[id]'");
        echo "<script>alert('Password Change Successfully')</script>";
    } else {
        echo "<script>alert('error')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="tablestyle.css">
    <link rel="stylesheet" href="mystyle.css">

</head>
<style type="text/css">
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
  <div class="form">
   <form class="form-horizontal" method="post" action="">
        <div class="solid">
                <center><h2>CHANGE YOUR PASSWORD</h2></center>
  </div><br><br>
    <div class="content">
       
                <div class="form-group" align="center">
                    <label class="col-md-4 control-label" for="old">OLD PASSWORD :</label>
                    <input type="password" name="pass" id="pass" required="">
                </div><br>

                <div class="form-group" align="center">
                    <label class="col-md-4 control-label" for="newpassword">NEW PASSWORD :</label>
                    <input type="password" name="newpassword" id="newpassword" required="">
                </div><br>

                <div align="center" class="form-group">
                    <input type="submit" name="reset" class="btn btn-success" value="Change Password">
                </div>

            
        </form>

    </div>
</body>

</html>