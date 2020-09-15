<?php 
session_start();
unset($_SESSION['std_id']);
header("location:index.php");
?>
