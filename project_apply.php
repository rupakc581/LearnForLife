 <html>
 <head><title>Applied Project</title>
 </head>
 <body>
 <?php
 session_start();
 if(!isset($_SESSION['std_id'])){
 header("Location: index.php");
}
else
{
 
include("stud_nav.php");
	include_once 'connect.php';
$std_id=$_SESSION['std_id'];

if(isset($_GET["apply"])){

	$p_id=$_GET["id"];
$sql_query="insert into project_apply(std_id,proj_id) values('$std_id','$p_id')";

mysqli_query($connect,$sql_query) or die ('Error');}
$r = mysqli_query($connect,"Select * from  project,project_apply where project.proj_id=project_apply.proj_id AND project_apply.std_id='$std_id' AND project_apply.accept=0");
		?><form class="form2">
	<table>
	<header>Applied Project</header>
	<?php
		$i=1;
		
while ($det = mysqli_fetch_array($r)){
	?>
	<div>
	
	<?php
	echo "<th><h3>Project Detail </h3></th>";
	    	  echo "<tr><td><b><u>Project Title:</td><td>{$det["title"]}</u></b></td></tr>";
 	      echo "<tr><td>Project Description:</td><td>{$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td>{$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td>{$det["start_date"]}</td>".
		 "<tr><td>End Date:</td><td>{$det["end_date"]}</td>".
		 "<tr><td>Description:</td><td>{$det["description"]}</td></tr>";
		$i++;
		$p_id=$det["proj_id"];
		$result = mysqli_query($connect,"Select emp_id from  emp_pro where emp_pro.proj_id='$p_id'");
while ($get = mysqli_fetch_array($result)){
$emp_id=$get["emp_id"];
}
$result = mysqli_query($connect,"Select emp_name from  employer where employer.emp_id='$emp_id'");
while ($get = mysqli_fetch_array($result)){
echo "<tr><td>Posted by:</td><td> {$get["emp_name"]}</td></tr>";
}
?>
	 
<?php
}?>
</table>
</form><?php	
}

?>
</body>
</html>