<html>
<head><title>Employer List</title><link rel="stylesheet" href="css/adm_style.css"></head>
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
	$query=mysqli_query($connect,"Select * from employer");
	
	
	while($det=mysqli_fetch_array($query)){
		?>
	<form class="form1" method="GET" action="delete_emp.php">
	<header>Employer</header>
	<table>
		 <tr><td>Name:</td><td> <input type = "text" name = "user" value = "<?php echo $det['emp_name'];?>"disabled></td></tr>
 <tr><td>email:</td><td> <input type = "email" name = "email" value = "<?php echo $det['emp_email'];?>" disabled></td></tr>
 <tr><td>Contact:</td><td><input type = "text" name = "contact" value = "<?php echo $det['contactnum'];?>"disabled></td></tr>
 <tr><td>Description:</td><td><input type = "text" name = "description" value = "<?php echo $det['description'];?>"disabled></td></tr>
 <tr><td>	<input type = "hidden" value = "<?php echo $det['emp_id'];?>" name = "emp_id"/></td></tr>
 <tr><td><input type = "submit" value = "Delete"></td></tr>
	
	</table>
</form>
<?php
	}
}
?>
