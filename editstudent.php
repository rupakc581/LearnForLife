<html>
<head><title>Edit Profile</title>
</head>
<body>
<?php
include("stud_nav.php");
session_start();
if(!isset($_SESSION["std_id"])){
 header("Location:index.php");
}
else
{

?>

<?php
}

$id= $_SESSION["std_id"];
include ("connect.php");
$query = mysqli_query($connect,"Select * from  student where student.std_id='$id'");?>
<form action = "updateStudent.php" method = "POST" class="form2">
 <table>
<header>Edit Profile</header><?php
while ($det = mysqli_fetch_array($query)){
	?>
	
	
 <tr><td>Name:</td><td> <input type = "text" name = "user" value = "<?php echo $det['std_name'];?>"/></td></tr>
 <tr><td>Email:</td><td> <input type = "email" name = "email" value = "<?php echo $det['std_email'];?>" disabled></td></tr>
 <tr><td>Password:</td><td><input type = "password" name = "password" value = "<?php echo $det['std_password'];?>"/></td></tr>
 <tr><td>Location:</td><td><input type = "text" name = "location" value = "<?php echo $det['location'];?>"/></td></tr>
  <tr><td>Skills:</td><td><input type = "text" name = "skills" value = "<?php echo $det['skills'];?>"/></td></tr>
 <tr><td>Work Experience:</td><td><input type = "text" name = "workexp" value = "<?php echo $det['workexperience'];?>"/></td></tr>
 <tr><td>Educational attainment:</td><td><input type="text" name = "edu" value="<?php echo $det['educationalattainment'];?>"/></td></tr>
 <tr><td>	<input type = "hidden" value = "<?php echo $det['std_id'];?>" name = "id"/></td></tr>
 <tr><td><input type = "submit" value = "Update"></td></tr>
 
 
	<?php
}
?>
</table>
 </form>
</body>
</html>
