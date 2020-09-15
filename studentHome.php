 <?php
 session_start();
if(!isset($_SESSION["std_id"])){
 header("Location:index.php");
}
else
{
	?>
<html>
<head><title>Student Home</title>
 <link rel="stylesheet" href="css/stdstyle.css">

 </head>
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
    background-color: #555;
    color: black;
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
<header>Logged Student: <?=$_SESSION['std_name'];?><div><form class="form1" action="search.php" method="POST"><input type="text" placeholder="Type to Search" name="search"><input type="submit" id="btnSearch" value="Search"></form></div></header>

	<ul>
    <li class="dropdown">
        <a href="#" class="dropbtn">Projects</a>
        <div class="dropdown-content">
            <a href="studentHome.php">Posted Project</a>
            <a href="project_apply.php">Applied Project</a>
			<a href="std_project.php">My project</a>
        </div>
    </li>
        
    <li class="dropdown">
	<a href="#" class="dropbtn">Setting</a>
	 <div class="dropdown-content">
            <a href="editstudent.php">Edit Profile</a>
            <a href="std_logout.php">Log Out</a>
        </div></li>
	<li>
            <a href="adm_logout.php">Help</a>
    </li>
</ul>
<?php
$s_id=$_SESSION['std_id'];

include ("connect.php");
?>
	<div id="hide">
	
	<?php
	$r = mysqli_query($connect,"Select * from  project where vetted=1 and accept=0 group by title");
		$i=1;
while ($det = mysqli_fetch_array($r)){
	
  $p_id=$det["proj_id"]; 
	$sql = "SELECT app_id FROM project_apply WHERE std_id='$s_id' AND proj_id='$p_id'" ;
$mq = mysqli_query($connect,$sql);

if (mysqli_num_rows($mq) < 1) {
   ?>
		<form class="form2" method="GET" action="project_apply.php">
		<table>
		<header>Projects</header>		
	<div id="hide">	
	<?php
	    echo "<tr><td>Project Title:</td><td> {$det["title"]}</td></tr>";
 	      echo "<tr><td>Project Description:</td><td> {$det["proj_desc"]}</td></tr>".
         "<tr><td>Skills:</td><td> {$det["skills"]}</td></tr>".
         "<tr><td>Payment:</td><td> {$det["payment"]}</td></tr>".
		 "<tr><td>Start Date:</td><td> {$det["start_date"]}</td></tr> ".
		 "<tr><td>End Date:</td><td> {$det["end_date"]}</td></tr>".
		 "<tr><td>Description:</td><td> {$det["description"]}</td></tr>";
		$i++;		
$result = mysqli_query($connect,"Select emp_id from  emp_pro where emp_pro.proj_id='$p_id'");
while ($get = mysqli_fetch_array($result)){
$emp_id=$get["emp_id"];
}
$result = mysqli_query($connect,"Select emp_name from  employer where employer.emp_id='$emp_id'");
while ($get = mysqli_fetch_array($result)){
echo "<tr><td>Posted by:</td><td> {$get["emp_name"]}</td></tr>";
}
 ?>
<input type="hidden" name="id" value="<?php echo $p_id;?>"/>
		<tr><td><input type="submit" value="Apply" id="apply" name="apply"></td></tr>
<hr>
</table>
</form>
</body>
</html>
<?php
}  
}
}
?>