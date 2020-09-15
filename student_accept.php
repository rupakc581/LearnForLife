 <?php
 session_start();
 if(!isset($_SESSION['emp_email'])){
 header("Location: index.php");
}
else
{
$p_id=$_SESSION['p_id'];
include("emp_nav.php");

if(isset($_GET["select"])){


	include_once 'connect.php';

$std_id=$_GET["id"];

$query=mysqli_query($connect,"UPDATE project_apply SET accept=1 WHERE project_apply.std_id = '$std_id'");
$r=mysqli_query($connect,"UPDATE project set accept=1 where proj_id='$p_id'" );
if($query && $r){
header("Location:stupro_list.php?msg=Successfully Selected");
}

		
}
		


}

?>