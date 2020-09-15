<html>
<head><title>My projects</title></head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['std_id'])){
 header("Location: index.php");
}
else
{
include("stud_nav.php");
include("connect.php");
$std_id=$_SESSION['std_id'];
		$result=mysqli_query($connect,"Select proj_id from project_apply where std_id='$std_id' AND accept=1;");
	?><form class="form2">
	<table>
	<header>My Projects</header>
	<h3>Project Details</h3>	
	<?php
	while ($det = mysqli_fetch_array($result)){
		$proj_id=$det['proj_id'];	
		$query=mysqli_query($connect,"Select * from project where proj_id='$proj_id' group by title");
	while ($det = mysqli_fetch_array($query)){
		  echo "<tr><td><b><u>Project Title:</td><td>{$det["title"]}</u></b></td></tr>";
 	      echo "<tr><td>Project Description:</td><td>{$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td>{$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td>{$det["start_date"]}</td>".
		 "<tr><td>End Date:</td><td>{$det["end_date"]}</td>".
		 "<tr><td>Description:</td><td>{$det["description"]}</td></tr>";				 
		}
	} 
	?>
	</table></form><?php	 
	}
?>
</body>
</html>