<?php
if(isset($_COOKIE['lock'])){?>
	 <script type="text/javascript">
   
            alert("Invalid Login");
        
    </script><?php
 if($_COOKIE['lock']>=3){
	?>
	 <script type="text/javascript">
   
            alert("You attempt false login thrice,try again after 20 second");
        
    </script>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
    
  </head>

  <body background="freelance.png">

    
<form method="POST">
<header>LearnForLife Login</header>
  <label>Email<span>*</span></label>
  <input type="text" name="username"/>
  <label>Password <span>*</span></label>
  <input type="password" name="password"/>
   <label><input type="checkbox" class="link" name="autologin" value="1"> Remember me</label>
  <div class="help"><a href="register.php">Create New Account</a></div>
  <input type="submit" name="login" value="login" style="background:black;" Disabled/></form>
<?php } else { ?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
        <link rel="stylesheet" href="css/style.css">  
  </head>
  <body background="freelance.png">
  <?php if(isSet($_COOKIE['user'])){?>
<form method="POST">
<header>LearnForLife Login</header>
  <label>Email<span>*</span></label>
  <input type="text" name="username" value = "<?php echo $_COOKIE['user'];?>"/>
  <label>Password <span>*</span></label>
  <input type="password" name="password" value = "<?php echo $_COOKIE['pass'];?>"/>
   <label><input type="checkbox" class="link" name="autologin" value="1"> Remember me</label>
  <div class="help"><a href="register.php">Create New Account</a></div>
  <input type="submit" name="login" value="login"/></form><?php
  }
  else {?>
	 <form method="POST">
<header>LearnForLife Login</header>
  <label>Email<span>*</span></label>
  <input type="text" name="username"/>
  <label>Password <span>*</span></label>
  <input type="password" name="password"/>
   <label><input type="checkbox" class="link" name="autologin" value="1"> Remember me</label>
  <div class="help"><a href="register.php">Create New Account</a></div>
  <input type="submit" name="login" value="login"/></form> <?php 
  }
} 
}
   else {?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
        <link rel="stylesheet" href="css/style.css">  
  </head>
  <body background="freelance.png">
  <?php if(isSet($_COOKIE['user'])){?>
<form method="POST">
<header>LearnForLife Login</header>
  <label>Email<span>*</span></label>
  <input type="text" name="username" value = "<?php echo $_COOKIE['user'];?>"/>
  <label>Password <span>*</span></label>
  <input type="password" name="password" value = "<?php echo $_COOKIE['pass'];?>"/>
   <label><input type="checkbox" class="link" name="autologin" value="1"> Remember me</label>
  <div class="help"><a href="register.php">Create New Account</a></div>
  <input type="submit" name="login" value="login"/></form>
  <?php }
  else {?>
	 <form method="POST">
<header>LearnForLife Login</header>
  <label>Email<span>*</span></label>
  <input type="text" name="username"/>
  <label>Password <span>*</span></label>
  <input type="password" name="password"/>
   <label><input type="checkbox" class="link" name="autologin" value="1"> Remember me</label>
  <div class="help"><a href="register.php">Create New Account</a></div>
  <input type="submit" name="login" value="login"/></form> <?php
  }
 }?>   
  </body>
</html>
<?php
include("connect.php");

if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];



	$result=mysqli_query($connect,"SELECT * FROM employer,student,admin WHERE employer.emp_email='$user'
	 OR student.std_email='$user' OR admin.adm_username='$user' AND employer.emp_password='$pass' OR 
	 student.std_password='$pass' OR admin.adm_password='$user'");
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
	if( isset($_POST['autologin']) )
	{
	$cookie_time = 86400 * 20;
	setcookie ('user', $user, time() + $cookie_time);
	setcookie ('pass', $pass, time() + $cookie_time);
	}
	}
//checking employer email and password
	if($user == $emp_mail && $pass == $emp_pass)
	{
		setcookie(lock, 0, 1);
	session_start();
	$_SESSION['emp_email']=$user;
	$_SESSION['emp_id']=$emp_id;
	$_SESSION['emp_name']=$emp_name;
	header("Location: employerHome.php");
	}
	//checking student email and password
 elseif($user==$std_mail && $pass== $std_pass) {
	 setcookie(lock, 0, 1);
		session_start();
	$_SESSION['std_email']=$user;
	$_SESSION['std_id']=$std_id;
	$_SESSION['std_name']=$std_name;
	header("Location: studentHome.php");
	}
	//checking admin username and password for login
	elseif($user==$adm_username && $pass==$adm_password) {
		setcookie(lock, 0, 1);
		session_start();
			$_SESSION['adm_user']=$user;
	$_SESSION['adm_id']=$adm_id;
	header("Location: admHome.php");
	}
	}
	//setting time for locking login to the system
	 elseif(isset($_COOKIE['lock'])){
		setcookie('lock', $_COOKIE['lock']+1, time()+20);
	header("location:index.php");
	
	} else {
		setcookie('lock', 1, time()+20);
		header("location:index.php");
	}
}
	 
?>