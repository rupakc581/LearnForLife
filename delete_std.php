<?php
include("adm_nav.php");
session_start();
if(!isset($_SESSION["adm_user"])){
 header("Location: index.php");
}
else
{
	include("connect.php");
	$std_id=$_GET['std_id'];
$a=mysqli_query($connect,"Delete from project_apply where std_id='$std_id'");
	$r=mysqli_query($connect,"Delete from student where std_id='$std_id'");
	if ($r && $a) {
		 header("Location:adm_user.php?msg=sucessfully value deleted"); 
				$message = "The user was successfully removed.";
			} else {
				$message = "The user could not be removed.";
			}
 header("Location:adm_user.php?msg=sucessfully value deleted"); 
}
?>