<?php
include "connection.php";
include "adminnavbar.html";
include "sessionAdmin.php";
include "footer.html";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_POST['insert'])) {
    $pID = $_POST['patient_id'];
    $history = $_POST['name'];
    $date = $_POST['date'];
    $test = $_POST['test'];
    $result = $_POST['result'];

    $sql = "INSERT INTO `patientdata`(`id`, `patient_id`, `medical_history`, `date`, `test`, `result`) VALUES (NULL, '$pID', '$history', '$date', '$test', '$result')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('data inserted!')</script>";
        echo "<script>window.location.assign('patientdisplay.php')</script>";
    } else {
        echo "<script>alert('data error!')</script>";
        echo "<script>window.location.assign('patientdisplay.php')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>PATIENT'S DATA</title>
    <link rel="stylesheet" href="tablestyle.css">
    <link rel="stylesheet" href="mystyle.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<style type="text/css">
     div.solid 
    {
      
      color:white;
      background-color: rgba(0,0,0,0.5);
      width: 1470px;
               border: 1px;
        padding: 15px;
        margin: 10px; 
    }
</style>

<body>
    <div class="solid">
        <h2><center> ADD PATIENT'S DATA </center></h2>
    </div>
    <br>

    <form action="" method="post">
        <div class="content">
            <input type="number" name="1" placeholder="ID (IC Number)" value="<?php echo $id; ?>" disabled>
            <input type="text" name="patient_id" placeholder="ID (IC Number)" value="<?php echo $id; ?>" hidden><br><br>

            <input type="text" name="name" placeholder="Medical History"><br><br>

            <input type="date" name="date" placeholder="Date"><br><br>

            <input type="text" name="test" placeholder="Test"><br><br>

            <input type="text" name="result" placeholder="Result"><br><br>

           <!--  <select name="test">
                <option value="-1">Select Test</option>
                <?php
                $srchtest = mysqli_query($con, "SELECT `test` FROM `patientdata`");
                while ($row = mysqli_fetch_array($srchtest)) {
                ?>
                    <option value="<?php echo $row['test'] ?>"><?php echo $row['test']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>

            <select name="result">
                <option value="-1">Select Result</option>
                <option value="Positive">Positive</option>
                <option value="Negative">Negative</option>
                <option value="Pending">Pending</option>
            </select><br><br> -->

            <input type="submit" name="insert" value="Add" class="submit1">
        </div>


    </form>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('#vehicle').DataTable();
    });
    $(document).ready(function() {
        $('#example').DataTable();
        $('#service').DataTable();
    });
</script>

</html>