<?php
if(isset($_POST['empsignup'])){
	include_once 'connect.php';
	$emp_name=$_POST['empname'];
	$emp_email=$_POST['empemail'];
	$emp_password=$_POST['emppass'];
	$emp_contact=$_POST['empcontact'];
	$emp_description=$_POST['empdes'];

$sql = "SELECT emp_id FROM employer WHERE emp_email='$emp_email'" ;
$mq = mysqli_query($connect,$sql);

if (mysqli_num_rows($mq) < 1) {
	$sql_query="insert into employer(emp_name,emp_email,emp_password,
	contactnum,description)values('$emp_name','$emp_email',
	'$emp_password','$emp_contact','$emp_description')";
	mysqli_query($connect,$sql_query) or die ('Error');
header("location:index.php");
}
else{
	echo "Email Already exists";
}
}
?>