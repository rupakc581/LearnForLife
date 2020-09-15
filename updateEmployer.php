	<?php
session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location: index.php");
}
else
{
?>
<?php
}
?>
<?php
include ("connect.php");
$mail=$_SESSION["emp_email"];
$id = $_POST['id'];
$name = $_POST['user'];
$contact = $_POST['contact'];
$description = $_POST['description'];
$password = $_POST['password'];
$query1 = mysqli_query($connect,"UPDATE employer SET emp_name = '$name', 
description = '$description', emp_password = '$password', contactnum = '$contact'
 WHERE employer.emp_email = '$mail'");
if($query1){
	header("Location: employerHome.php?msg=Successfully Update");
	echo $description;
}else{
	header ("Location: employerHome.php?msg=Error");
}
?>