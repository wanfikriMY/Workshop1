<?php
include "connection.php";
include "usernavbar.html";
include "footer.html";
//include "sessionPatient.php";
session_start();
//echo session_id();
//$patient_id = $_POST['id'];
//$patient_id = $_SESSION["id"];
?>

<html lang="en">

<head>
  <title>CHECK REQUESTS</title>
 <link rel="stylesheet" href="tablestyle.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<style type="text/css">
       body
    {
      font-family:'Handlee',cursive;
      margin:0;
      background-image: url('img/bg.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: 100% 100%;
      box-sizing: border-box;
      overflow: hidden;
      display: grid;
      height: 100%;
      padding: 0;
  }

  div.solid 
    {
      
      color:white;
      background-color: rgba(0,0,0,0.5);
      width: 1470px;
               border: 1px;
        padding: 15px;
        margin: 10px; 
    }
    table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 20px;
text-align: left;
table-layout: auto;

}

th 
{
background-color: lightblue;
color: blue;
}

tr:nth-child(even) 
{
  background-color: black;
  color:white;
}
tr:nth-child(odd) 
{
  background-color: white;
  color:black;
}

</style>

<body>
  <div class="solid">
    <center><h2>CHECK YOUR APPOINTMENT REQUEST STATUS</h2></center>
  </div>
  <table class="active" style="width : 100%;">
    <thead>
      
        <tr>
          <th>Date</th>
          <th>Session</th>
          <th>Doctor Name</th>
          <th>Remark</th>
          <th>Status</th>
        </tr>
      
    </thead>

    <tbody>
      <?php
      $OID = $_SESSION['id'];
      $sql = "SELECT * FROM appointment INNER JOIN doctor on appointment.doc_id = doctor.doc_id WHERE patient_id='$_SESSION[id]'";
      $result = $con->query($sql);
      if (!empty($result) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $date = $row['date'];
          $session = $row['session'];
          $doctor = $row['doc_id'];
          $remark = $row['remark'];
          $status = $row['status'];
      ?>
          <input type="hidden" name="patient_id" value="<?php echo $row["patient_id"]; ?>" />
          <tr>
            <td><?php echo $date; ?></td>
            <td><?php echo $session; ?></td>
            <td><?php $resultdn = mysqli_query($con, "SELECT `name` from `doctor` where doc_id = '$doctor'");
                while ($row = mysqli_fetch_assoc($resultdn)) {
                  echo $row['name'];
                } ?></td>
            <td><?php echo $remark; ?></td>
            <td><?php echo $status; ?></td>
          </tr>
        <?php
        }
      } else {
        ?>
      <?php
      }
      ?>
    </tbody>


  </table>
</body>

</html>