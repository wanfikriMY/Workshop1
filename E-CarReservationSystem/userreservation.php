<?php
include 'navbar.php';
require 'db.php';

// SELECT * FROM `reservation` INNER JOIN car ON reservation.carid=car.carid INNER JOIN servicecenter ON reservation.centerid=servicecenter.centerid WHERE reservation.user_id = 960603085997 AND reservation.status = "Pending

$sql = mysqli_query($con, "SELECT * FROM `user` WHERE user_id = $_SESSION[mysesi] ");
if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $userid = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
    }
}

if (isset($_GET['delete'])) {
    $reservation_id = $_GET['delete'];
    $sqldelete = "DELETE FROM reservation WHERE reservationid = '$reservation_id'";
    if (!mysqli_query($con, $sqldelete)) {
        echo "<script>alert('Delete Failed')</script>";
        header("refresh:0;url = userreservation.php");
    } else {
        echo "<script>alert('Delete Successfully') </script>";
        header("refresh:0;url = userreservation.php");
    }
}

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
    <h2 align="center"><?php echo $username ?> Reservation</h2>

    <table class="active" id="service" style="width: 100%">
        <thead>
            <tr>
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
                <th></th>
            </tr>
        </thead>
        <tbody>


            <?php

            $sql = "SELECT * FROM `reservation` INNER JOIN car ON reservation.carid=car.carid INNER JOIN servicecenter ON reservation.centerid=servicecenter.centerid WHERE reservation.user_id = '$userid'";
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
                    $deposit = $row['deposit'];

            ?>

                    </tr>

                    <tr>
                        <td style="text-align: center;"><?php echo $date; ?></td>
                        <td style="text-align: center;"><?php echo $time; ?></td>
                        <td style="text-align: center;"><?php echo $carplate; ?></td>
                        <td style="text-align: center;"><?php echo $model; ?></td>
                        <td style="text-align: center;"><?php echo $type; ?></td>
                        <td style="text-align: center;"><?php echo $distrinct; ?>, <?php echo $hangername;  ?></td>
                        <td style="text-align: center;"><?php echo $package; ?></td>
                        <td style="text-align: center;">RM <?php echo $total; ?></td>
                        <td style="text-align: center;"><?php echo $status; ?></td>
                        <td><?php if ($status == 'Pending' && $deposit === '0') {
                                echo "<a href='userreservation.php?delete=$reservationid'>Cancel Reserve</a>";
                            } elseif ($status == 'Approve') {
                                echo "Please Come To Service Center on " . $date;
                            } else {
                                echo "Wait for Approval";
                            } ?>
                            <!-- == <input type="button" value="Cancel Booking" onclick="window.location.href='userreservation.php?delete=<?php echo $reservationid;
                                                                                                                                            $delete = $reservationid; ?>'"/></td> == -->
                        <td><?php if ($status == 'Approve') {
                                echo "<a href='quotation.php?id=$reservationid'>View Quotation</a>";
                            } elseif ($status == 'Pending' && $deposit == '0') {

                                echo "<a href='quotation.php?id=$reservationid'>Make a deposit payment</a>";
                            } else {
                                echo "<a href='quotation.php?id=$reservationid'>View Quotation</a>";
                            }
                            ?>
                        </td>
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

    $('#open_script').click(function() {
        window.location.assign('userreservation.php?delete=<?php echo $reservationid;
                                                            $delete = $reservationid ?>');
    });

    $('#quotation').click(function() {
        window.location.assign('quotation.php?id=<?php echo $reservationid;
                                                    $delete = $reservationid ?>');
    });
</script>