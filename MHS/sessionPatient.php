<?php
session_start();
if (!isset($_SESSION['type']) == 'patient' && !isset($_SESSION['id'])) {
    echo "<script>window.location.assign('homepage.php')</script>";
}

