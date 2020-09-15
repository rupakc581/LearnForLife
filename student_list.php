<?php
include("emp_nav.php");
session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location: index.php");
}
else {
	include("connect.php");
	$proj_id=$_GET['project_id'];
		
	$query=mysqli_query($connect,"Select * from project_apply where proj_id='$proj_id'");
	$i=1;
	while ($get = mysqli_fetch_array($query)){
	$std_id=$get['std_id'];
	$result=mysqli_query($connect,"Select * from student where std_id='$std_id'");
	while ($det = mysqli_fetch_array($result)){
		?>
	<div>
	<form method="GET" action="student_accept.php">
	<table>
	<?php
	$_SESSION['p_id']=$proj_id;
	    echo "<tr><td><b><u>Student Name:</td><td>{$det["std_name"]}</u></b></td></tr>";
 	      echo "<tr><td>Email:</td><td>{$det["std_email"]}</td></tr>".
         "<tr><td>Location:</td><td>{$det["location"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
		 "<tr><td>Work Experience:</td><td>{$det["workexperience"]}</td>".
		 "<tr><td>Educational Attainment:</td><td>{$det["educationalattainment"]}</td>";
		 }
		$i++;
		 ?>
		 </table>
		<div style="float:left; margin-right:20px"> <input type="Submit" value="select" name="select"></div><br>
		 <input type="hidden" name="id" value="<?php echo $std_id;?>"/>
 </form>
 </div>
	<?php
	}	
}
?>