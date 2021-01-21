<?php
include "connection.php";
include "adminnavbar.html";
include "footer.html";

if (isset($_GET['appoint'])) {
    $pID = $_GET['appoint'];
}

$sql = mysqli_query($con, "SELECT * FROM `patient` WHERE patient_id = '$pID'");
while ($row = mysqli_fetch_assoc($sql)) {
    $pName = $row['name'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>APPOINTMENT</title>
    <link rel="stylesheet" href="mystyle.css">
    <style type="text/css">
    table {
      border-style: hidden;
      background-color: white;
      border-radius: 12px;
    }

    td,
    tr {
      padding: 10px 10px;
      align-items: "center";
    }

    table.center {
      margin-left: auto;
      margin-right: auto;
    }

</style>
</head>

<body>
    <div class="solid">
        <h2>REQUEST YOUR CONSULTATION</h2>
    </div>
    <form action="sendAppointment-staff.php" method="POST" name="myForm" id="myForm" onsubmit="return(validate());">
        <table class="center">

            <tr>
                <td><input type="text" name="id" value="<?php echo $pID; ?>" hidden></td>
            </tr>

            <tr>
                <td>PATIENT'S NAME</td>
                <td><input type="text" value="<?php echo $pName; ?>"></td>
            </tr>

            <tr>
                <td>DOCTOR'S NAME :</td>
                <td><select name="doctor">
                        <option value="-1">Select Doctors</option>
                        <?php
                        $srchDr = mysqli_query($con, "SELECT * FROM `doctor`");
                        while ($row = mysqli_fetch_array($srchDr)) {
                        ?>
                            <option value="<?php echo $row['doc_id'] ?>"><?php echo $row['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>DATE OF CONSULTATION :</td>
                <td><input type="date" name="date" placeholder="Enter date"></td>
            </tr>
            <tr>
                <td>SESSION :</td>
                <td><select name="session" id="session">
                        <option value="-1">Select session</option>
                        <option value="morning">Morning</option>
                        <option value="evening">Evening</option>
                    </select></td>

            </tr>
            <tr>
                <td>REMARK :</td>
                <td><textarea name="remark" id="remark" cols="30" rows="10"></textarea></td>
            </tr>

            <tr>
                <td>&nbsp</td>
                <td><input type="submit" name="submit" value="submit">
            </tr>


        </table>
    </form>
</body>
<script>
    function validate() {
        if (document.myForm.doctor.value == "-1") {
            alert("Please select your doctors");
            document.myForm.doctor.focus();
            return false;
        }

        if (document.myForm.date.value == "") {
            alert("Please select your appointment date");
            document.myForm.date.focus();
            return false;
        }

        if (document.myForm.session.value == "-1") {
            alert("Please select appoint session");
            document.myForm.session.focus();
            return false;
        }

    }
</script>

</html>