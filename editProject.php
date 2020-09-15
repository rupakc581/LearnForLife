<html>
<head><title>Edit Profile</title>
<link rel="stylesheet" href="css/Homestyle.css">
</head>
<body>
<?php
include("emp_nav.php");
session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location: studentlogin.php");
}
else
{
?>

<?php
$id=$_GET["id"];
include("connect.php");
}
if(isset($_GET["edit"])){

$query = mysqli_query($connect,"Select * from  project where project.proj_id='$id'");
while ($det = mysqli_fetch_array($query)){
	?>
	<div>
	<form action = "updateProject.php" method = "POST">

 <label>Project Title:</label> <input type = "text" name = "title" value = "<?php echo $det['title'];?>"/>
  <label>Project Description</label><input type="text" name="proj_desc" value="<?php echo $det['proj_desc'];?>"/>
 <label>Skills</label><input type = "text" name = "skills" value = "<?php echo $det['skills'];?>"/>
 <label>Payment</label><input type = "text" name = "payment" value = "<?php echo $det['payment'];?>"/>
 <label>Start Date</label><input type = "date" name = "start_date" value = "<?php echo $det['start_date'];?>"/>
 <label>End Date</label><input type = "date" name = "end_date" value = "<?php echo $det['end_date'];?>"/>
<label>Description</label><input type="text" name="description" value="<?php echo $det['description'];?>"/>
 <input type = "submit" value = "Update">
  <input type = "hidden" name="proj_id" value = "<?php echo $det['proj_id'];?>"/>
 
 </form>
 </div>
	<?php
}
}
else if(isset($_GET["delete"])){
	$a=mysqli_query($connect,"Delete from emp_pro where emp_pro.proj_id='$id'");
	$r=mysqli_query($connect,"Delete from project where project.proj_id='$id'");
	if ($r && $a) {
		 header("Location:proj_display.php?msg=sucessfully value deleted"); 
				$message = "The project was successfully removed.";
			} else {
				$message = "The project could not be removed.";
			}
 header("Location:proj_display.php?msg=sucessfully value deleted"); 
}
?>

