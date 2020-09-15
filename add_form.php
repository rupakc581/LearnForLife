<?php
if(isset($_POST['add'])){
	session_start();
	$emp_id=$_SESSION["emp_id"];
	include_once 'connect.php';
	$title=$_POST['proj_title'];
	$proj_desc=$_POST['proj_desc'];
	$skills=$_POST['skills'];
	$payment=$_POST['payment'];
	$start=$_POST['start_date'];
	$end=$_POST['end_date'];
	$des=$_POST['des'];

$sql_query="insert into project(title,proj_desc,skills,payment,start_date,end_date,description)
values('$title','$proj_desc','$skills','$payment','$start','$end','$des')";
mysqli_query($connect,$sql_query) or die ('Error');
$query = mysqli_query($connect,"Select proj_id from  project where project.title='$title'");
while ($det = mysqli_fetch_array($query)){
$id=$det['proj_id'];
$r="Insert into emp_pro(emp_id,proj_id) values('$emp_id','$id')";
mysqli_query($connect,$r) or die ('Error');
}	
header("location:proj_display.php?msg:Add Successfully");
}
else{
	echo "error";
}
?>