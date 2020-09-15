<?php 
session_start();
unset($_SESSION['emp_email']);
header("location:index.php");
?>
