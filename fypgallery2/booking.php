<?php
session_start();
require 'navbar.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

?>

<style>
  p {
    text-align: left;
  }
</style>

<body>

  <br>
  <div class="container">
    <div class="w3-center" style="padding:5% 40px" id="contact">

      <h3 class="w3-center">Please Fill this Consultation Form</h3>
      <div style="margin-top:48px" class="w3-center">
        <form action="sendemail.php" method="POST" class="w3-center" style="width:40%;">


          <input class="w3-input w3-border" type="text" size="40" placeholder="Enter Full Name" name="lid" id="lid" value="<?php echo $id; ?>"></p>
          <p><strong>Name</strong> <input class="w3-input w3-border" type="text" size="40" placeholder="Enter Full Name" name="sname" id="sname"></p>
          <p><strong>Email</strong><input class="w3-input w3-border" type="email" size="40" placeholder="Enter Email" name="semail" id="semail"></p>
          <p><strong>Phone Number</strong><input class="w3-input w3-border" type="number" size="40" placeholder="Enter Phone Number" name="phone" id="phone"></p>
          <p><strong>Message Details</strong>
            <p>Subject<input class="w3-input w3-border" type="text" size="40" placeholder="Enter Message" name="subject" id="subject">
              Message<input class="w3-input w3-border" type="textarea" size="40" placeholder="Enter Message" name="msg" id="msg"></p>

            <button class="w3-button w3-black w3-center" type="submit" size="40" name="register-submit" class="registerbtn">
              Submit
            </button>
        </form>

      </div>




    </div>
</body>


<?php include 'footer.php'; ?>