<html>
<head><title>Project List</title></head>
<body>
<?php
include("emp_nav.php");
session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location: index.php");
}
else
{
?>
<?php
}
$email= $_SESSION["emp_email"];
$emp_id=$_SESSION["emp_id"];
include ("connect.php");
$result = mysqli_query($connect,"Select * from  emp_pro where emp_pro.emp_id='$emp_id'"); 
while ($get = mysqli_fetch_array($result)){
	$p_id=$get["proj_id"];
$query = mysqli_query($connect,"Select * from  project where project.proj_id='$p_id' group by project.title");
$i=1;
?>
<form method="GET" action="editProject.php">
<header>Project Lists</header>
<table>
<?php
while ($det = mysqli_fetch_array($query)){
	$flag=false;
	?>
	<?php
	    echo "<tr><td><b><u>Project Title:</td><td>{$det["title"]}</u></b></td></tr>";
 	      echo "<tr><td>Project Description:</td><td>{$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td>{$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td>{$det["start_date"]}</td>".
		 "<tr><td>End Date:</td><td>{$det["end_date"]}</td>".
		 "<tr><td>Description:</td><td>{$det["description"]}</td></tr>";
		 $vet=$det["vetted"];
		 if($vet==1){
			 echo "<tr><td>Status:</td><td>Approved</td></tr>";
		 }
		 else {
		 echo "<tr><td>Status:</td><td>Pending</td></tr>";
		 }	 
		$i++;
		 $record=mysqli_query($connect,"Select * from project_apply where proj_id='$p_id'");
		 while ($let=mysqli_fetch_array($record)){
			 $accept=$let["accept"];
			 $proj_id=$let["proj_id"];
		 If($vet==1 && $accept==1){
			 $flag=true;
		 }
		 }
			if($flag==false){
				echo "<tr><td>Selected Status:</td><td>Not Selected</td></tr>";
				echo "<tr><td><a href=student_list.php?project_id=$p_id>Student Apply Lists</a></td></tr>";	
			}
			else if($flag==true) {
				echo "<tr><td>Selected Status:</td><td>Selected</td></tr>";
			}?>
		<tr><td><div style="float:left; margin-right:10px"> <input type="submit" value="edit" name="edit"></td>
		<td><div style="float:left;"> <input type="submit" value="delete" name="delete"></div><br></td></tr>
		 <input type="hidden" name="id" value="<?php echo $p_id;?>"/>
</table>
</form>
	<?php
}
}
?>
</body>
</html>

