<?php

include "connection.php";
//include "sessionPatient.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $doctorName = $_POST['doctor'];
    $date = $_POST['date'];
    $session = $_POST['session'];
    $remark = $_POST['remark'];

    $ticket = $id . $doctorName . $date . $session . $remark;
    
    $sql = "INSERT INTO `appointment` (`appointment_id`, `patient_id`, `date`, `session`, `doc_id`, `remark`, `status`, `ticket`) VALUES (NULL, '$id', '$date', '$session', '$doctorName', '$remark', 'pending', '$ticket')";

    if (!mysqli_query($con, $sql)) {
        echo "<script>alert('Appointment cannot be added')</script>";
       // echo $doctorName . " " .  $date . " " . $session . " " . $remark . " " . $id;
    } else {
        echo "<script>alert('Appointment added')</script>";
    }
    //echo $doctorName . " " .  $date . " " . $session . " " . $remark . " " . $id;
    header("refresh:0;url = appointmentRecord.php?status=pending");
}
