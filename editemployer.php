<html>
<head><title>Edit Profile</title>
</head>
<body>
<?php
include("emp_nav.php");
session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location:index.php");
}
else
{

?>

<?php
}

$email= $_SESSION["emp_email"];
include ("connect.php");
$query = mysqli_query($connect,"Select * from  employer where employer.emp_email='$email'");?>
<form action = "updateEmployer.php" method = "POST">
<header>Edit Profile</header>
 <table><?php
while ($det = mysqli_fetch_array($query)){
	?>

	
 <tr><td>Name:</td><td> <input type = "text" name = "user" value = "<?php echo $det['emp_name'];?>"/></td></tr>
 <tr><td>email:</td><td> <input type = "email" name = "email" value = "<?php echo $det['emp_email'];?>" disabled></td></tr>
 <tr><td>password:</td><td><input type = "password" name = "password" value = "<?php echo $det['emp_password'];?>"/></td></tr>
 <tr><td>Contact:</td><td><input type = "text" name = "contact" value = "<?php echo $det['contactnum'];?>"/></td></tr>
 <tr><td>Description:</td><td><textarea name = "description"><?php echo $det['description'];?></textarea></td></tr>
 <tr><td>	<input type = "hidden" value = "<?php echo $det['id'];?>" name = "id"/></td></tr>
 <tr><td><input type = "submit" value = "Update"></td></tr>
 

	<?php
}
?>
</table>
 </form>
</body>
</html>
