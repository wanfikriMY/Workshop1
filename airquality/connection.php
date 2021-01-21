<?php

$conn = mysqli_connect ("localhost","root","","airquality");

if (mysqli_connect_errno())
{
	echo 'Database not found!';
}
?>