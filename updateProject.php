	<?php
session_start();
if(!isset($_SESSION["sess_user"])){
 header("Location: studentlogin.php");
}
else
{
?>
<?php
}
?>
<?php
include ("connect.php");
$id =$_POST['proj_id'];
$title = $_POST['title'];
$skills = $_POST['skills'];
$proj_desc = $_POST['proj_desc'];
$payment = $_POST['payment'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];
$desc = $_POST['description'];
$query1 = mysqli_query($connect,"UPDATE project SET title = '$title',
	proj_desc = '$proj_desc',skills = '$skills',payment = '$payment',
	start_date='$start',end_date='$end',description='$desc' WHERE project.proj_id = '$id'");

if($query1){
	header("Location:proj_display.php?");
}else{
	header ("Location: employerHome.php?msg=sorry");
}
?>