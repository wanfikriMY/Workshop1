<?php
include 'navbar.php';
require 'db.php';


if (isset($_GET['approve'])) {
    $reservation_id = $_GET['approve'];
    $sqlget = mysqli_query($con, "SELECT * FROM `reservation` INNER JOIN car ON reservation.carid=car.carid INNER JOIN servicecenter ON reservation.centerid=servicecenter.centerid WHERE reservation.reservationid='$reservation_id'");
    if ($sqlget->num_rows > 0) {
        while ($row = $sqlget->fetch_assoc()) {
            $reservationid = $row['reservationid'];
            $user_id = $row['user_id'];
            $distrinct = $row['distrinct'];
            $hangername = $row['hangername'];
            $model = $row['model'];
            $manufacturer = $row['manufacturer'];
            $type = $row['type'];
            $date = $row['date'];
            $time = $row['start_time'];
            $total = $row['total'];
            $plate = $row['plate'];
            $package = $row['package'];
            
        }
    }
}
if ($manufacturer == 'Honda' || 'Toyota') {
    $charge = 200;
}
if ($manufacturer == "Proton" || 'Perodua') {
    $charge = 150;
} else {
    $charge = 250;
}

$subtotal = $total + $charge;

if (isset($_POST['submit'])) {

    $reservationid2 = $reservationid;
    $subtotal2 = $subtotal;

    $sqlupdate = "UPDATE `reservation` SET `total`='$subtotal2',`status`='Approve' WHERE `reservationid` = '$reservationid2'";
    if (!mysqli_query($con, $sqlupdate)) {
        echo "<script>alert('Update Failed!')</script>";
    } else {
        echo "<script>alert('Update Successfully!')</script>";
        header("refresh:0;url = reservation.php");
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
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <b>Reservation id:</b> <?php echo $reservation_id; ?><br><br>
    <b>Service Center:</b></label> <?php echo $hangername . ", " . $distrinct; ?><br><br>
    <b>Car Plate:</b> <?php echo $plate; ?><br><br>
    <b>Service Date:</b> <?php echo $date; ?><br><br>
    <b>Sevice Time:</b> <?php echo $time; ?><br><br>
    <b>Car Model:</b><?php echo $model; ?><br><br>
    <b>Car Manufacturer:</b><?php echo $manufacturer; ?><br><br>
    <b>Service Pacakage:</b><?php echo $package . ", RM " . $total; ?><br><br>
    <?php

    ?>
    <form action="" method="POST">
        <label for="subtotal"><b>Subtotal :</b></label>
        <input type="text" name="subtotal" id="subtotal" disabled="" value="<?php echo $subtotal; ?>">
        <input type="submit" name="submit" id="submit">

        <!--============================================================================================================================
        <label for="subtotal2"><b>Subtotal:</b></label><?php $subtotal = $total + $charge; ?>
        <input type="text" name="subtotal2" id="subtotal2" disabled="" value="<?php echo $subtotal; ?>">
        <input type="button" value="Approve" onclick="window.location.href='updatereserve.php?approve=<?php echo $reservationid; ?>&total=<?php echo $subtotal; ?>'"/>

        <a href="deleteshare.php?did=<?php echo "$rowc[id]"; ?>&uid=<?php echo "$id"; ?>">DELETE</a> 
        =================================================================================================================================-->









</body>

</html>