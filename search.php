<?php
session_start();
if(!isset($_SESSION["std_id"])){
 header("Location:index.php");
}
else
{
include("stud_nav.php");
include("connect.php");
 $output = '';  
 $searchkey = $_POST["search"];
$query = mysqli_query($connect,"Select * from  project where title like
 '$searchkey%' AND accept=0 AND vetted=1 group by project.title");  
 if(mysqli_num_rows($query) > 0)  {
	 while ($det = mysqli_fetch_array($query)){		
   ?>
		<form class="form2" method="GET" action="project_apply.php">
		<table>
		<header>Search Result</header>		
	<div id="hide">	
	<?php
	    echo "<tr><td>Project Title:</td><td> {$det["title"]}</td></tr>";
 	      echo "<tr><td>Project Description:</td><td> {$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td> {$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td> {$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td> {$det["start_date"]}</td></tr> ".
		 "<tr><td>End Date:</td><td> {$det["end_date"]}</td></tr>".
		 "<tr><td>Description:</td><td> {$det["description"]}</td></tr>";		
		$p_id=$det["proj_id"];
		$result = mysqli_query($connect,"Select emp_id from  emp_pro where emp_pro.proj_id='$p_id'");
while ($get = mysqli_fetch_array($result)){
$emp_id=$get["emp_id"];
}
$result = mysqli_query($connect,"Select emp_name from  employer where employer.emp_id='$emp_id'");
while ($get = mysqli_fetch_array($result)){
echo "<tr><td>Posted by:</td><td> {$get["emp_name"]}</td></tr>";
}
$std_id=$_SESSION['std_id'];
$go=mysqli_query($connect,"select * from project_apply where proj_id='$p_id' AND std_id='$std_id'");
if(mysqli_num_rows($go)== 0)  {
		 ?>
<input type="hidden" name="id" value="<?php echo $p_id;?>"/>
		<tr><td><input type="submit" value="Apply" id="apply" name="apply"></td></tr>
<?php } 
else {
	echo "<tr><td>Already Applied</td></tr>";
}?>
<hr>
</table>
</form>
</body>
</html>
<?php
}
 }
 else{
	 echo "No record found";
 }
}
 ?>