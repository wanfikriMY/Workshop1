<?php
session_start();
if (!isset($_SESSION['type']) == 'admin' && !isset($_SESSION['id'])) {
    
    echo "<script>window.location.assign('homepage.php')</script>";

}
