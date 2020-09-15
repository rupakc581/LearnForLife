<?php
include("connect.php");

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];



	$result=mysqli_query($connect,"SELECT * FROM employer,student,admin WHERE 
	employer.emp_email='$user' OR student.std_email='$user' OR admin.adm_username='$user' 
	AND employer.emp_password='$pass' OR student.std_password='$pass' OR admin.adm_password='$user'");
	$numrows=mysqli_num_rows($result);
	if($numrows!=0)
	{
	while($row=mysqli_fetch_assoc($result))
	{
	$emp_mail=$row['emp_email'];
	$emp_pass=$row['emp_password'];
	$std_mail=$row['std_email'];
	$std_pass=$row['std_password'];
	$adm_username=$row['adm_username'];
	$adm_password=$row['adm_password'];
	$emp_id=$row['emp_id'];
	$std_id=$row['std_id'];
	$adm_id=$row['admin_id'];
	$emp_name=$row['emp_name'];
	$std_name=$row['std_name'];
	}

	if($user == $emp_mail && $pass == $emp_pass)
	{
	session_start();
	$_SESSION['emp_email']=$user;
	$_SESSION['emp_id']=$emp_id;
	$_SESSION['emp_name']=$emp_name;
	header("Location: employerHome.php");
	}
 elseif($user==$std_mail && $pass== $std_pass) {
		session_start();
			$_SESSION['std_email']=$user;
	$_SESSION['std_id']=$std_id;
	$_SESSION['std_name']=$std_name;
	header("Location: studentHome.php");
	}
	elseif($user==$adm_username && $pass==$adm_password) {
		session_start();
			$_SESSION['adm_user']=$user;
	$_SESSION['adm_id']=$adm_id;
	header("Location: admHome.php");
	}
	}
	 elseif(isset($_COOKIE['luckout'])){
		setcookie('luckout', $_COOKIE['luckout']+1, time()+2000);
	$error = "Invalid username and password........";
	echo $error;
	} else {
		setcookie('luckout', 1, time()+2000);
		$error = "Invalid username and password........";
	}
	mysqli_close($con);
}
	 
?>
