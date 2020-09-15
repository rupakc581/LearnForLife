 <html>
 <head><title>Selected project and student page</title>
 </head>
 <body>
 <?php
 session_start();
 if(!isset($_SESSION['emp_email'])){
 header("Location: index.php");
}
else
{ 
include("emp_nav.php");
include("connect.php");
$email=$_SESSION['emp_email'];
$query=mysqli_query($connect,"Select emp_id from employer where emp_email='$email'");?>
<form>
	<header>Accepted Project Lists</header>
<table><?php
while ($det = mysqli_fetch_array($query)){
	$e_id=$det['emp_id'];
}
$r=mysqli_query($connect,"Select proj_id from emp_pro where emp_id='$e_id'");
while ($met = mysqli_fetch_array($r)){
	$p_id=$met['proj_id'];
$result=mysqli_query($connect,"Select proj_id from project_apply where proj_id='$p_id' AND accept=1");
	while ($det = mysqli_fetch_array($result)){
		$proj_id=$det['proj_id'];
		$a=mysqli_query($connect,"Select * from project where proj_id='$proj_id'");
	while ($det = mysqli_fetch_array($a)){
	echo"<tr><th>Project Details</th></tr>";
		  echo "<tr><td><b><u>Project Title:</td><td>{$det["title"]}</u></b></td></tr>";
 	      echo "<tr><td>Project Description:</td><td>{$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td>{$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td>{$det["start_date"]}</td>".
		 "<tr><td>End Date:</td><td>{$det["end_date"]}</td>".
		 "<tr><td>Description:</td><td>{$det["description"]}</td></tr>";		
$s = mysqli_query($connect,"Select std_id from  project_apply where accept=1 AND proj_id='$proj_id';");
while ($det = mysqli_fetch_array($s)){
	$std_id=$det['std_id'];
$t = mysqli_query($connect,"Select * from  student where student.std_id='$std_id'");
		$i=1;
while ($det = mysqli_fetch_array($t)){
	
	echo "<tr><th>Student Details</th></tr>"; 
		  echo "<tr><td><b><u>Student Name:</td><td>{$det["std_name"]}</u></b></td></tr>";
 	      echo "<tr><td>Email:</td><td>{$det["std_email"]}</td></tr>".
         "<tr><td>Location:</td><td>{$det["location"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
		 "<tr><td>Work Experience:</td><td>{$det["workexperience"]}</td>".
		 "<tr><td>Educational Attainment:</td><td>{$det["educationalattainment"]}</td>";
		$i++;	
		?>
		 <?php
	}
	}
}
}
}
?>
</table>
</form> <?php
}
?>
</body>
</html>