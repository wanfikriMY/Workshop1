<?php
require 'db.php';
include 'navbaruser.php';
session_start();
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['id'])) {
  echo "<script>window.location.assign('login-student.php')</script>";
} else {
  $sessionID = $_SESSION['mysesi'];

  echo $_SESSION['mytype'];
}


$sqls = "SELECT * FROM `project` WHERE studentId1 = '$sessionID' OR studentId2 = '$sessionID'";
$result = mysqli_query($con, $sqls);
while ($row = mysqli_fetch_assoc($result)) {
  $projectId = $row['projectID'];
}
?>

<!DOCTYPE html>
<html>
<title>Home</title>

<body>


  <div class="w3-container" style="padding:100px" id="about">
    <p class="w3-center w3-large">Welcome Student! </p>

    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
      <div class="w3-col l6 m5 w3-margin-bottom">
        <div class="w3-card">
          <div class="w3-container">
            <h3>Upload Your Project</h3>
            <p class="w3-opacity">Please fill all information in the form provided</p>
            <p>Project the has been submitted can be view in your profile</p>
            <p><a href="repo-project.php" class="w3-button w3-light-grey w3-block"><i class="fa fa-upload"></i> Upload</a></button></p>
          </div>
        </div>
      </div>

      <div class="w3-col l6 m6 w3-margin-bottom">
        <div class="w3-card">
          <div class="w3-container">
            <h3>Edit Your Project</h3>
            <p class="w3-opacity">Edit Your Project</p>
            <p>Please update your information in the form provided</p>
            <p><a href="edit-project.php?projectID=<?php echo $projectId; ?>" class="w3-button w3-light-grey w3-block"><i class="fa fa-wrench"></i> Update</a></button></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<?php include 'footer.php'; ?>