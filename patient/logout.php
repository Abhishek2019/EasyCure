<?php
session_start();
session_destroy();
header("location:hospital_login.php");
?>