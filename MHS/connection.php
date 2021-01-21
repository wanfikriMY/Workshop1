<?php

$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="MHS";
$con= mysqli_connect($SERVERNAME,$USERNAME,$PASSWORD,$DB);
if(!$con)
{
echo 'Not connected';
}
if(!mysqli_select_db($con,$DB))
{
echo 'Database not found';
}
?>