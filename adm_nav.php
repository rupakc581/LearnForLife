<html>
<head><title>Admin Home</title>
 <link rel="stylesheet" href="css/adm_style.css">
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
<header><div class="left"></header>
	<ul>
    <li>
        <a href="admHome.php" class="dropbtn">Projects</a>
		</li>
		<li class="dropdown">
		<li>
		<a href="adm_user.php">Student</a>
		<a href="admin_employeer.php">Employer</a>
    </li>
        
    <li>
            <a href="adm_logout.php">Log Out</a>
        </li>
</ul>