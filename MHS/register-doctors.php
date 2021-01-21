<?php
include 'connection.php';
include 'adminnavbar.html';
include "footer.html";

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
    <title>REGISTER DOCTORS</title>
    <style type="text/css">
        
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
      margin: 6px 4px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 12px;
      width:30%;
    }

  input[type=submit]:hover 
    {
      background-color: hsla(290, 60%, 70%, 0.3);
      color: black;
      border: 2px solid #e7e7e7;
      border-color: black;
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
    
    </style>

</head>

<body>
  <div class="solid">
        <h2><center>REGISTER DOCTORS</center></h2>
    </div>
    <br><br>
    <form action="" method="post">
        <div class="content">
            <label for="name">NAME :</label>
            <input type="text" name="name" placeholder="NAME"><br><br>
            <label for="email">EMAIL :</label>
            <input type="email" name="email" placeholder="EMAIL"><br><br>
            <label for="phone">PHONE :</label>
            <input type="text" name="phone" placeholder="PHONE"><br><br>
            <label for="room">ROOM NUMBER :</label>
            <input type="text" name="room" placeholder="ROOM NUMBER"><br><br>


            <input type="submit" name="register" value="Register" class="submit">
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room = $_POST['room'];

    $sqlAdd = "INSERT INTO `doctor`(`doc_id`, `name`, `email`, `phone`, `roomNo`) VALUES (NULL, '$name', '$email' , '$phone','$room')";

    if (mysqli_query($con, $sqlAdd)) {
        echo "<script>alert('New Doctor successfully added!')</script>";
        echo "<script>window.location.assign('doctors.php')</script>";
    } else {
        echo "<script>alert('Error while updating data')</script>";
    }
}

?>