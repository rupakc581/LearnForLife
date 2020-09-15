<?php
include_once 'connect.php';
$stu_name=$_POST['stuname'];
	$stu_email=$_POST['stuemail'];
	$stu_password=$_POST['stupass'];
	$stu_location=$_POST['stulocation'];
	$stu_skills=$_POST['skill'];
	$stu_workexp=$_POST['std_exp'];
	$stu_eduattain=$_POST['std_edu'];
	$sql = "SELECT std_id FROM student WHERE std_email='$stu_email'" ;
$mq = mysqli_query($connect,$sql);

if (mysqli_num_rows($mq) < 1) {

$sql_query="insert into student (std_name,std_email,std_password,location,skills,
workexperience,educationalattainment) values('$stu_name','$stu_email','$stu_password',
'$stu_location','$stu_skills','$stu_workexp','$stu_eduattain')";
mysqli_query($connect,$sql_query) or die ('Error');
header("location:index.php");
}
else {
	echo " Email Already exists";
}
?>