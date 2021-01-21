<?php
include 'db.php';
include 'navbar.php';

$sqlgetuser = "SELECT * FROM `user` WHERE `user_id`='$_SESSION[mysesi]'";
$resultgetuser = $con->query($sqlgetuser);
if ($resultgetuser->num_rows > 0) {
    while ($row = $resultgetuser->fetch_assoc()) {
        $name = $row['username'];
        $email = $row['email'];
    }
}

if (isset($_GET['id'])) {
    $reservationid = $_GET['id'];
    $sql = "SELECT * FROM `reservation` INNER JOIN car ON reservation.carid=car.carid INNER JOIN servicecenter ON reservation.centerid=servicecenter.centerid WHERE reservation.reservationid = '$reservationid'";
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
            $manufacturer = $row['manufacturer'];
            $deposit = $row['deposit'];
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
if ($package == 'package A') {
    $ptotal = 350;
}
if ($package == 'package B') {
    $ptotal = 250;
}
if ($package == 'package C') {
    $ptotal = 150;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="divToPrint">
        <h1>Quotation</h1>
        Hi <?php echo $name; ?><br>
        This is your Quotation: <br><br>
        Car Plate Number : <?php echo $carplate; ?><br><br>
        Car Model : <?php echo $model; ?><br><br>
        Car Manufacturer:<?php echo $manufacturer; ?><br><br>
        Service on : <?php echo $date . ", " . $time; ?><br><br>
        Service Center : <?php echo $distrinct . ", " . $hangername; ?><br><br>
        Package Selected : <?php echo $package; ?><br><br>
        Status : <b><?php echo $status; ?></b><br><br>
        <?php
        if ($deposit === '0') {
        ?>
            Total (Package + Charge) : <br>
            <?php echo "RM " . $ptotal . " + RM " . $charge . " = RM" . $total; ?><br><br>
        <?php


        } else {
        ?>
            <?php echo "TOTAL RM " . $ptotal; ?><br><br>
        <?php
        }

        ?>

        <!-- <input type="button" value="print" onclick="PrintDiv();" /> -->
        &nbsp; &nbsp;
        <?php
        if ($deposit === '0') {
        ?>
            <td><b>Please make a payment of RM <?php echo $charge; ?> as deposit</b></td> <br><br>
            <td><input type="button" value="Upload Deposit Receipt" onclick="window.location.href='uploadDeposit.php?upload=<?php $upload = $reservationid;
                                                                                                                            echo $upload; ?>'" /></td>

        <?php
        } elseif ($deposit != '0' && $status === 'Pending') {
            echo "<b>Please wait for approval</b>";
        } elseif ($status === 'Approve' && $deposit != '0') {
        ?>
            <input type="button" value="print" onclick="PrintDiv();" />
        <?php
        }
        ?>

    </div>
</body>
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>

</html>