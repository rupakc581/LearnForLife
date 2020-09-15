<?php
include("adm_nav.php");
session_start();
if(!isset($_SESSION["adm_user"])){
 header("Location: index.php");
}
else
{
	include("connect.php");
	$emp_id=$_GET['emp_id'];
	$query=mysqli_query($connect,"select proj_id from emp_pro where emp_id='$emp_id'");
	while ($let=mysqli_fetch_array($query)){
		$p_id=$let['proj_id'];
		echo $p_id;
		$b=("Delete from project_apply where proj_id='$p_id'");
		$c=("Delete from project where proj_id='$p_id'");
	$a=("Delete from emp_pro where proj_id='$p_id'");
	mysqli_query($connect,$b) or die ('a Error');
	mysqli_query($connect,$c) or die ('b Error');
	mysqli_query($connect,$a) or die ('c Error');
	
	}
	$r=mysqli_query($connect,"Delete from employer where emp_id='$emp_id'");
	if ($r) {
		 header("Location:adm_user.php?msg=sucessfully value deleted"); 
				$message = "The user was successfully removed.";
			} else {
				$message = "The user could not be removed.";
			}
}
?>