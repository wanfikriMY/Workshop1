<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";
// include "sessionAdmin.php";

if (isset($_GET['status'])) {
    $status = $_GET['status'];
}

switch ($status) {

    case 'pending':
        $sql2 = "SELECT * from appointment INNER JOIN patient ON patient.patient_id = appointment.patient_id INNER JOIN doctor on appointment.doc_id = doctor.doc_id WHERE `status` = 'pending'";
        break;

    case 'complete':
        $sql2 = "SELECT * from appointment INNER JOIN patient ON patient.patient_id = appointment.patient_id INNER JOIN doctor on appointment.doc_id = doctor.doc_id WHERE `status` = 'completed'";
        break;

    default:
        $sql2 = "SELECT * from appointment INNER JOIN patient ON patient.patient_id = appointment.patient_id INNER JOIN doctor on appointment.doc_id = doctor.doc_id";
        break;
}


if (isset($_GET['complete'])) {
    $completeId = $_GET['complete'];
    $sql = "UPDATE `appointment` SET `status` = 'completed' WHERE `appointment`.`appointment_id` = '$completeId'";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Appointment updated!')</script>";
        echo "<script>window.location.assign('appointmentRecord.php?status=pending')</script>";
    } else {
        echo "<script>alert('error while updating!')</script>";
        echo "<script>window.location.assign('appointmentRecord.php?status=pending')</script>";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablestyle.css">
    <title>APPOINTMENT RECORDS</title>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
        <h2><center>APPOINTMENT RECORDS </center></h2>
    </div>
    <br>
    <div class="solid">
            <tr>
                <td><input type="button" value="Pending" onclick="window.location.href='appointmentRecord.php?status=<?php echo 'pending'; ?>'"></td>
                <td><input type="button" value="Completed" onclick="window.location.href='appointmentRecord.php?status=<?php echo 'complete'; ?>'"></td>
                <td><input type="button" value="All" onclick="window.location.href='appointmentRecord.php?status=<?php echo 'all'; ?>'"></td>
                 <td><input type="button" value="Create new Appointment" onclick="window.location.href=' new-appointment.php'"></td>
            </tr>
        <br>

        <table id="service" style="width: 100%">
            <thead>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Doctor Name</th>
                <th>Remark</th>
                <th>Status</th>
            </thead>
            <tbody>
               <?php

                $result = $con->query($sql2);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $appoint = $row['appointment_id'];
                        $pID = $row['patient_id'];
                        $date = $row['date'];
                        $time = $row['session'];
                        $remark = $row['remark'];
                        $status = $row['status'];
                        $doctorID = $row['doc_id'];
                ?>

                        <tr id=<?php echo $appoint; ?>>
                            <td><?php echo $pID; ?></td>
                            <td><?php $sqlpn = "SELECT `name` from `patient` where patient_id = $pID";
                                $resultpn = mysqli_query($con, $sqlpn);
                                while ($row = mysqli_fetch_assoc($resultpn)) {
                                    echo $row['name'];
                                } ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $time; ?></td>
                            <td><?php $resultdn = mysqli_query($con, "SELECT `name` from   `doctor` where doc_id = $doctorID");
                                while ($row = mysqli_fetch_assoc($resultdn)) {
                                    echo $row['name'];
                                } ?></td>
                            <td><?php echo $remark; ?></td>
                            <td><?php echo $status; ?> <br>
                                <?php if ($status == "pending") { ?>
                                    <input type='button' value="Mark as Complete" onclick="window.location.href = 'appointmentRecord.php?complete=<?php echo $appoint; ?>'" ; <?php
                                                                                                                                                                            } else {
                                                                                                                                                                            } ?> </td>
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
    </div>


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

</html>