<html>
<head>
</head>
<body>
<?php
include("adminHome.php");
session_start();
if(!isset($_SESSION["adm_user"])){
 header("Location: index.php");
}
else
{
$p_id=$_GET["id"];
$vetted=$_GET["vetted"];
include("connect.php");
}
if(isset($_GET["approve"])){

$query1 = mysqli_query($connect,"UPDATE project SET vetted=1 WHERE project.proj_id = '$p_id'");
if(query1){
	$message="approved";
	 header("Location:admHome.php?msg=sucessfully project approved"); 
}
}
else if(isset($_GET["dis"])){
	$a=mysqli_query($connect,"Delete from emp_pro where emp_pro.proj_id='$p_id'");
	$r=mysqli_query($connect,"Delete from project where project.proj_id='$p_id'");
if($a && $r){
	$message="dissapproved";
	 header("Location:admHome.php?msg=sucessfully project disapproved");
	 ?>
<?php 
}

}
?>

