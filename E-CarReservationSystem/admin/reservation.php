<?php
include 'navbar.php';
require 'db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h1 align="center">E-Car Service Reservation System</h1>
    <h2 align="center">Manage Reservation</h2>

    <table class="active" id="service" style="width: 100%">
        <thead>
            <tr>
                <th>Service ID</th>
                <th>User ID</th>
                <th>Service Date</th>
                <th>Time</th>
                <th>Car Plate</th>
                <th>Car Model</th>
                <th>Car Type</th>
                <th>Service Location</th>
                <th>Package</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>


            <?php

            $sql = "SELECT * FROM `reservation` INNER JOIN car ON reservation.carid=car.carid INNER JOIN servicecenter ON reservation.centerid=servicecenter.centerid";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $date = $row['date'];
                    $time = $row['start_time'];
                    $carplate = $row['plate'];
                    $model = $row['model'];
                    $type = $row['type'];
                    $distrinct = $row['distrinct'];
                    $hangername = $row['hangername'];
                    $status = $row['status'];
                    $package = $row['package'];
                    $total = $row['total'];
                    $reservationid = $row['reservationid'];
                    $user_id = $row['user_id'];

            ?>

                    </tr>

                    <tr>
                        <td style="text-align: center;"><?php echo $reservationid; ?></td>
                        <td style="text-align: center;"><?php echo $user_id; ?></td>
                        <td style="text-align: center;"><?php echo $date; ?></td>
                        <td style="text-align: center;"><?php echo $time; ?></td>
                        <td style="text-align: center;"><?php echo $carplate; ?></td>
                        <td style="text-align: center;"><?php echo $model; ?></td>
                        <td style="text-align: center;"><?php echo $type; ?></td>
                        <td style="text-align: center;"><?php echo $distrinct; ?>, <?php echo $hangername;  ?></td>
                        <td style="text-align: center;"><?php echo $package; ?></td>
                        <td style="text-align: center;">RM <?php echo $total; ?></td>
                        <td style="text-align: center;"><?php echo $status; ?></td>
                        <td><input type="button" value="Update Booking" onclick="window.location.href='appreservation.php?approve=<?php echo $reservationid;
                                                                                                                                    $approve = $reservationid; ?>'" /></td>


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
    </table><br>

</body>

</html>
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