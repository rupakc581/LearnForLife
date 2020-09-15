
<html>
<head><title>Student List</title><link rel="stylesheet" href="css/adm_style.css"></head>
</body>
<?php
include("adm_nav.php");
session_start();
if(!isset($_SESSION["adm_user"])){
 header("Location: index.php");
}
else
{
	include("connect.php");
$result=mysqli_query($connect,"Select * from student");
	
	while($det=mysqli_fetch_array($result)){
		?><form class="form2" method="GET" action="delete_std.php">
	<table>
	<header>Student</header>
	<tr><td>Name:</td><td> <input type = "text" name = "user" value = "<?php echo $det['std_name'];?>"disabled></td></tr>
 <tr><td>Email:</td><td> <input type = "email" name = "email" value = "<?php echo $det['std_email'];?>" disabled></td></tr>
 <tr><td>Location:</td><td><input type = "text" name = "location" value = "<?php echo $det['location'];?>"disabled></td></tr>
  <tr><td>Skills:</td><td><input type = "text" name = "skills" value = "<?php echo $det['skills'];?>"disabled></td></tr>
 <tr><td>Work Experience:</td><td><input type = "text" name = "workexp" value = "<?php echo $det['workexperience'];?>"disabled></td></tr>
 <tr><td>Educational attainment:</td><td><input type="text" name = "edu" value="<?php echo $det['educationalattainment'];?>"disabled></td></tr>
 <tr><td>	<input type = "hidden" value = "<?php echo $det['std_id'];?>" name = "std_id"/></td></tr>
 <tr><td><input type = "submit" value = "Delete"></td></tr>
</table>
</form>
 <?php		
}
}
?>