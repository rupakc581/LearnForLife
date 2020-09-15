 <?php
 session_start();
if(!isset($_SESSION["emp_email"])){
 header("Location:index.php");
}
else
{
	?>
<html>
<head><title>Employer Home</title>
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
<header>Logged Employer: <?=$_SESSION['emp_name'];?></header>
	<ul>
    <li class="dropdown">
        <a href="#" class="dropbtn">Projects</a>
        <div class="dropdown-content">
            <a href="employerHome.php">New</a>
            <a href="proj_display.php">Existing</a>
			<a href="stupro_list.php">Selected</a>
        </div>
    </li>
        
    <li class="dropdown">
	<a href="#" class="dropbtn">Setting</a>
	 <div class="dropdown-content">
            <a href="editemployer.php">Edit Profile</a>
            <a href="emp_logout.php">Log Out</a>
        </div></li>
</ul>


<form method="post" action="add_form.php">
<header>Add Project</header>
<label>Project Title</label><input type ="text" name="proj_title" required>
<label>Project Description</label><input type ="text" name="proj_desc" required>
<label>Skills Needed</label><input type ="text" name="skills" required>
<label>Payment</label><input type ="text" name="payment" placeholder="example:$ 60" required>
<label>Start Date</label><input type ="date" name="start_date" required>
<label>End Date</label><input type ="date" name="end_date" required>			
<label>Description</label><input type ="text" name="des" required>
<label><input type="submit" value="Add" name="add"></label>
</form>
</table>
</body>
</html>
<?php
}
?>