<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";

?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlQuery = mysqli_query($con, "SELECT * FROM `doctor` WHERE `doc_id` = $id") or die("Database Error!: " . mysqli_error($con));
    while ($row = mysqli_fetch_assoc($sqlQuery)) {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $room = $row['roomNo'];
    }
}

if (isset($_POST['Submit'])) {
    // $fID = $_POST['fid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $roomNum = $_POST['room'];

    $sqlUpdate = "UPDATE `doctor` SET `name`='$name', `email`='$email', `phone`='$phone', `roomNo`='$roomNum' WHERE doc_id = '$id'";


    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Record update successfully!')</script>";
        echo  "<script>window.location.assign('doctors.php') </script>";
    } else {
        echo "<script>alert('Error while updating data')</script>";
        mysqli_error($con);
    }
}

if (isset($_POST['Delete'])) {
    $sqlDelete = "DELETE from `doctor` WHERE doc_id = '$id'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Record deleted successfully!')</script>";
        echo  "<script>window.location.assign('doctors.php') </script>";
    } else {
        echo "<script>alert('Error while updating data')</script>";
        mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablestyle.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <title>EDIT DOCTOR'S DETAILS</title>

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
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      width: 1470px;
      border: 1px;
      padding: 15px;
      margin: 10px;
      font-family: Monospace;
      font-size: 20px;
      text-align: center;
    }
     .content 
 {
   max-width: 550px;
   margin: auto;
   background: white;
   padding: 10px;
    text-align: center;
  }

   input[type=submit] 
    {
      background: transparent;
      background-color: white;
      border-color: black;
      color: black;
      padding: 6px 6px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 12px;
    }

  input[type=submit]:hover 
    {
      background-color: hsla(290, 60%, 70%, 0.3);
      color: black;
      border: 2px solid #e7e7e7;
      border-color: black;
    }

    </style>
</head>

<body>
    <div class="solid">
        <h2><center>EDIT DOCTORS' DETAILS </center></h2>
    </div>
    <br><br>
    <div class="content">
        <form action="" method="POST">
            <div>
                <label for="fid">ID :</label>
                <input type="text" value="<?php echo $id; ?>" disabled>
                <input type="text" name="fid" value="<?php echo $id; ?>" hidden>
            </div>
            <div>
                <label for="name">NAME :</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>

            <div>
                <label for="email">EMAIL :</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>

            <div>
                <label for="phone">PHONE:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>">
            </div>

            <div>
                <label for="roomNo">ROOM NUMBER :</label>
                <input type="text" name="room" value="<?php echo $room; ?>">
            </div>
            <br><input type="submit" value="Submit" name="Submit"> &nbsp; &nbsp; <input type="submit" name="Delete" value="Delete">
    </form>
    </div>

    

</body>

</html>