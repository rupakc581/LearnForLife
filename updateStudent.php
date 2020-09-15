	<?php
session_start();
if(!isset($_SESSION["std_id"])){
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
$id=$_SESSION["std_id"];
$name = $_POST['user'];
$location = $_POST['location'];
$skills = $_POST['skills'];
$workexp = $_POST['workexp'];
$edu = $_POST['edu'];
$password = $_POST['password'];
$query1 = mysqli_query($connect,"UPDATE student SET std_name = '$name',
 location = '$location', std_password = '$password', skills = '$skills',
 workexperience='$workexp', educationalattainment='$edu' WHERE student.std_id = '$id'");
if($query1){
	header("Location: editstudent.php?msg=Successfully Update");
	echo $description;
}else{
	header ("Location: editstudent.php?msg=Error");
}
?>