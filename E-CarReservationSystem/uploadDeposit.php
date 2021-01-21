<?php
include 'db.php';
include 'navbar.php';

if (isset($_POST['submit'])) {
    $sqlCharge = $_POST['sqlCharge'];
    $sqlID = $_POST['sqlID'];
    //pdf files
    $pdfFile = $_FILES['files']['name'];
    $tmpDirPdf = $_FILES['files']['tmp_name'];
    $pdfSize = $_FILES['files']['size'];
    $pdfDir = 'files/';
    $pdfExt = strtolower(pathinfo($pdfFile, PATHINFO_EXTENSION));
    $validPdfExt = array('pdf');
    $cPdf = rand(1000, 1000000) . "." . $pdfExt;

    //move img from tmp to dir
    if (in_array($pdfExt, $validPdfExt)) {
        move_uploaded_file($tmpDirPdf, $pdfDir . $cPdf);
    } else {
        $errorMsg = "<script>alert ('Sorry, please upload PDF files only') </script>";
        echo $errorMsg;
    }

    //tak ada $errorMsg proceed upload ke db
    if (!isset($errorMsg)) {
        $sqlAdd = (mysqli_query($con, "UPDATE `reservation` SET `fileDir`= '$cPdf', `deposit` = '$sqlCharge' WHERE `reservationid`= '$sqlID'"));
        if (!isset($error)) {
            echo "<script>alert ('Your receipt successfully uploaded! Please download your quotation later') </script>";
            echo "<script>window.location.assign('quotation.php?id=" . $id = $sqlID . "')</script>";
        } else {
            echo "<script>alert ('Error occured while uploading your project') </script>";
        }
    }
}


if (isset($_GET['upload'])) {
    $reservationid = $_GET['upload'];
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

echo "<script>alert ('Please make deposit of RM " . $charge . "') </script>";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit</title>
</head>

<body>
    <h1>Make a deposit</h1>
    <b>Amount to pay: RM<?php
                        echo $charge;
                        ?> </b><br><br>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="reciept">Upload your reciept payment.</label><br><br>
        <input type="file" id="files" name="files"><br><br>
        <input type="submit" value="Submit" name="submit">

        <input type="text" value="<?php echo $reservationid; ?>" name="sqlID" id="sqlID" hidden>
        <input type="text" name="sqlCharge" id="sqlCharge" value="<?php echo $charge; ?>" hidden>
    </form>

</body>

</html>