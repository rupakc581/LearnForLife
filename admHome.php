 <?php
 session_start();
if(!isset($_SESSION["adm_id"])){
 header("Location:index.php");
}
else
{
	?>
<html>
<head><title>Admin Home/Projects</title>
 <link rel="stylesheet" href="css/Homestyle.css">
 <head>
<style>
header {
	background: Brown;
  padding: 30px;
  margin-bottom:20px;
  color: white;
  font-size: 1.2em;
 
  border-radius: 10px 10px 0 0;
  color:white;
}
div.left{
	float:right;
}
        ul {
			float:left;
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: brown;
	border: 1px solid #555;
}

li a {
    display: block;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
	text-align: center;
    border-bottom: 1px solid #555;
}
text-align: center;
    border-bottom: 1px solid #555;
.active {
    background-color: #4CAF50;
    color: white;
}
li a:hover {
    background-color: green;
    color: white;
}

        .dropbtn {
    
          
            text-align: center;
        
            text-decoration: none;
        }

        .dropdown:hover .dropbtn {
            background-color: green;
        }

       

        .dropdown-content {
            display: none;
            background-color:white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
			background-color: brown;
		color:white}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
	</head>
	<body background="freelance.png">
<header>Logged Admin: <?=$_SESSION['adm_user'];?></header>
	<ul>
    <li>
        <a href="admHome.php" class="dropbtn">Projects</a>
		</li>
		<li>
		<a href="adm_user.php">Student</a>
		<a href="admin_employeer.php">Employer</a>
		
    </li>
        
    <li>
            <a href="adm_logout.php">Log Out</a>
        </li>
</ul>

<?php
include ("connect.php");
$query = mysqli_query($connect,"Select * from  project where vetted=0 group by project.title");
$i=1;
while ($det = mysqli_fetch_array($query)){
	?>
	<div id="hide">
	<form method="GET" action="project_approve.php">
	<table>
	<?php
	    echo "<tr><td><b><u>Project Title:</td><td>{$det["title"]}</u></b></td></tr>";
 	      echo "<tr><td>Project Description:</td><td>{$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td>{$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td>{$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td>{$det["start_date"]}</td>".
		 "<tr><td>End Date:</td><td>{$det["end_date"]}</td>".
		 "<tr><td>Description:</td><td>{$det["description"]}</td></tr>";
		$i++;
		$p_id=$det["proj_id"];
		$vet=$det["vetted"];
		$result = mysqli_query($connect,"Select emp_id from  emp_pro where emp_pro.proj_id='$p_id'");
while ($get = mysqli_fetch_array($result)){
$emp_id=$get["emp_id"];
}
$result = mysqli_query($connect,"Select emp_name from  employer where employer.emp_id='$emp_id'");
while ($get = mysqli_fetch_array($result)){
echo "<tr><td>Posted by:</td><td>{$get["emp_name"]}</td></tr>";
}
		 ?>

		<tr><td> <input type="submit" value="Approve" name="approve"></td>
		<td> <input type="submit" value="Disapprove" name="dis"></td></tr>
		 <input type="hidden" name="id" value="<?php echo $p_id;?>"/>
		  <input type="hidden" name="vetted" value="<?php echo $vetted;?>"/>
	</table>	 
 </form>
 </div>
<?php
}
}
?>