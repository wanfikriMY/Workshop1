<?php
include 'connection.php';
include "adminnavbar.html";
include "footer.html";

$sql = "SELECT * FROM `patient`";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>MAKE APPOINTMENTS</title>
    <link rel="stylesheet" href="tablestyle.css">
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
      
      color:white;
      background-color: rgba(0,0,0,0.5);
      width: 1470px;
               border: 1px;
        padding: 15px;
        margin: 10px; 
    }

    </style>
</head>

<body>
  <div class="solid">
        <h2><center>CREATE NEW APPOINTMENTS</center></h2>
    </div>
    <br>
    <div class="solid">
    <table id="service" style="width: 100%">
        <thead>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Make Appointment</th>
        </thead>
        <tbody>
            <?php
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pID = $row['patient_id'];
                    $name = $row['name'];
                    $age = $row['age'];
                    $phone = $row['phone'];
                    $email = $row['email'];
            ?>

                    <tr>
                        <td><?php echo $pID; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><input type="button" value="Make Appointment" onclick="window.location.href='appointment-staff.php?appoint=<?php echo $pID; ?>'"></td>
                    </tr>
                <?php
                }
            } else {
                ?>
            <?php
            }
            ?>

        </tbody>
        <tfoot>

        </tfoot>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>

</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#vehicle').DataTable();
    });
    $(document).ready(function() {
        $('#example').DataTable();
        $('#service').DataTable();
    });
</script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    </div>

</html>