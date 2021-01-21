<?php
session_start();

include "adminnavbar.html";
include "footer.html";

$host ="localhost";
$user = "root";
$password = "";
$database = "mhs";

$patient_id="";
$name="";
$gender="";
$age="";
$email="";
$phone="";
$address="";
$password="";

mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $connect=mysqli_connect($host, $user ,$password,$database);
} catch (Exception $ex) {
    echo 'Error';
}

function getPosts()
{
$posts=array();
$posts[0]=$_POST['patient_id'];
$posts[1]=$_POST['name'];
$posts[2]=$_POST['gender'];
$posts[3]=$_POST['age'];
$posts[4]=$_POST['email'];
$posts[5]=$_POST['phone'];
$posts[6]=$_POST['address'];


return $posts;

}

//search
if(isset ($_POST['search']))
{
    $data = getPosts();

    $sql ="SELECT * FROM patient WHERE patient_id = '$data[0]'";

    $search_Result = mysqli_query($connect,$sql);
    if($search_Result)
    {
    if(mysqli_num_rows($search_Result))
    {
        while($row = mysqli_fetch_array($search_Result))
        {
           $patient_id = $row['patient_id'];
           $name = $row['name'];
           $gender = $row['gender'];
           $age = $row['age'];
           $email = $row['email'];
           $phone = $row['phone'];
           $address = $row['address'];
      
        }   
        }else{
            echo '<script>alert("No Data For This ID")</script>';
        }

    } else{
        echo '<script>alert("Result Error")</script>';
    }
}

//Add

if (isset($_POST['insert'])) {
    $data = getPosts();
    $insert_Query = " INSERT INTO patient (patient_id,name,gender,age,email,phone,address,password) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','123456'); ";
    try {
        $insert_Result = mysqli_query($connect, $insert_Query);
        if ($insert_Result) {
            if (mysqli_affected_rows($connect) > 0) {
                echo '<script>alert("Data Inserted")</script>';
            } else {
                echo '<script>alert("Data Not Inserted")</script>';
            }
        }
    } catch (Exception $ex) {
        echo '<script>alert("Error insert")</script>' . $ex->getMessage();
    }
}
?>


<html>
<head>
<title>INSERT UPDATE DELETE SEARCH PATIENT</title>
<link rel="stylesheet" href="mystyle.css">
</head>
<div class="solid">
        <h2>INSERT UPDATE DELETE SEARCH PATIENT</h2>
    </div>
    <form  method="post" action="registerpatient.php" >
        <div class="content">
        
                
                <td><input type="number" name="patient_id" placeholder="ID(IC NUMBER " value= "<?php if(isset($patient_id))echo $patient_id ;?>"></input></td><br><br>
            
            
                <td><input type="text" name="name" placeholder="NAME" value= "<?php if(isset($name))echo $name ;?>" ></input></td><br><br>

               
                <td><input type="text" name="gender" placeholder="GENDER" value= "<?php if(isset($gender))echo $gender ;?>" ></input></td><br><br><td>
         
                <td><input type="text" name="age" placeholder="AGE" value= "<?php if(isset($age))echo $age ;?>" ></input></td><br><br>

    
                <td><input type="email" name="email" placeholder="EMAIL" value= "<?php if(isset($email))echo $email ;?>" ></input></td><br><br>

               
                <td><input type="tel" name="phone" placeholder="PHONE" value= "<?php if(isset($phone))echo $phone ;?>" ></input></td><br><br>
          
            
                <td><input type="text" name="address" placeholder="ADDRESS" value= "<?php if(isset($address))echo $address ;?>" ></input></td><br><br>
           
           
                
           
    

                <td><input type="submit" name="insert" value="Add"
                class="submit1" ></td>
                <td><input type="submit" name="update" value="Update" class="submit1"></td>
                <td><input type="submit" name="delete" value="Delete" class="submit1"></td>
                <td><input type="submit" name="search" value="Search" class="submit1"></td>
                <input type="button" name="display" value="Display" onclick="window.location='patientdisplay.php'" class="submit1">
                
            </tr>
        </table>
    </div>
    </form>
    </div>
</body>
</html>
<?php



//Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $sql="DELETE FROM `patient` WHERE patient_id=$data[0]";
    try{
        $delete_Result = mysqli_query($connect,$sql);

        if($delete_Result)
        {
            if(mysqli_affected_rows($connect)>0)
            {
                echo '<script>alert("Data Deleted")</script>';
            }else{
                echo '<script>alert("Data Not Deleted")</script>';
            }
            }
        } catch(Exception $ex) {
            echo '<script>alert("Error Delete")</script>'.$ex->getMessage();
        }
}


//update

if(isset($_POST['update']))
{
    $data = getPosts();
    $sql = "UPDATE `patient` SET `name`='$data[1]',`gender`='$data[2]',`age`='$data[3]',`email`='$data[4]',`phone`='$data[5]',`address`='$data[6]' WHERE `patient_id`='$data[0]'";

    try{
        $update_Result=mysqli_query($connect,$sql);
        if($update_Result)
        {
            if(mysqli_affected_rows($connect)>0)
            {
                echo '<script>alert("Data Updated")</script>';
            }else{
                echo '<script>alert("Data Not Updated")</script>';
            }
            }
        } catch(Exception $ex) {
            echo '<script>alert("Error Update")</script>'.$ex->getMessage();
        }
}


?>