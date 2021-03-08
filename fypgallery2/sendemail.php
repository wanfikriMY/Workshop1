<?php
require 'db.php';
require 'PHPMailer/PHPMailerAutoload.php';

$sname = $_POST['sname'];
$semail = $_POST['semail'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$lid = $_POST['lid'];

$display = "SELECT * FROM user WHERE id = '$lid'";
$result = mysqli_query($con, $display) or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($result)) {
    $lemail = $row['email'];
    $lname = $row['name'];


    $mail = new PHPMailer;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                          // Enable SMTP authentication
    $mail->Username   = 'fypgallery@gmail.com';                     // SMTP username
    $mail->Password   = 'Abc123@1';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;    // TCP port to connect to


    //Recipients
    $mail->setFrom('fypgallery@gmail.com', 'fypgallery');
    $mail->addAddress($lemail, $lname);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Dear Customer';
    $mail->Body    = $msg . '<b>';
    $mail->AltBody = 'From = ' . $semail;

    if (!$mail->send()) {
        echo "error";
        echo "m" . $mail->ErrorInfo;
    } else {
        echo "alert('1')";
    }
}
