<?php 
session_start();
unset($_SESSION['adm_user']);
header("location:index.php");
?>
