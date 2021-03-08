<?php
require 'db.php';
require 'navbar.php';

$result = mysqli_query($con, "SELECT * FROM `project` WHERE department = 'BCS' AND major = 'CSC4994'");


?>

<title>BCS Project</title>

<body>
<div class="w3-container" style="padding:50px 16px" id="about">
    &nbsp
    <h3 class="w3-center ">THE PROJECT</h3>
    <p class="w3-center w3-large">Discover all the previous project that has been made by BCS student.</p>
    
    <div class="w3-row-padding" style="margin-top:4px">
      <?php
      while ($row = mysqli_fetch_array($result)) {
      ?>

        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-card" style="padding:15px 15px">
            <div class="w3-container">
              <h3><?php echo substr_replace($row['projectName'],"... ", 15); ?></h3>
              <p class="w3-opacity"><?php echo $row['projectType']; ?> , <?php echo $row['year']; ?></p>
              <?php echo substr_replace($row['description'], " ...", 50); ?>
              <p><a href="project-description.php?projectID=<?php echo $row['projectID']; ?>" class="w3-button w3-light-grey w3-block"><i class="fa fa-book"></i> Read More</a></button></p>
            </div>
          </div>
        </div>
      
      <?php
      }
      ?>
      </div>
    </div>
  </div>
</body>
<?php include 'footer.php';?>