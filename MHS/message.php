<?php
include 'connection.php';

$getMesg = mysqli_real_escape_string($con, $_POST['text']);
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($con, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $reply = $fetch_data['replies'];
    echo $reply;
}else{
    echo "Sorry, I don't understand you. Can you say that again?";
}

?>
