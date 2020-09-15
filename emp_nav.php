 <html>
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
		form {
  background: white;
  width: 40%;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
  font-family: lato;
  color: #333;
  float:left;
  position relative;
  margin-left:10px;
  border-radius: 10px;
}
form input[type=submit]{
  position: relative;
  margin-top: 30px;
  margin-bottom: 30px;
  left: 50%;
  transform: translate(-50%, 0);
  font-family: inherit;
  color: white;
  background: brown;
  outline: none;
  border: none;
  padding: 5px 15px;
  font-size: 1.3em;
  font-weight: 400;
  border-radius: 3px;
  box-shadow: 0px 0px 10px rgba(51, 51, 51, 0.4);
  cursor: pointer;
  transition: all 0.15s ease-in-out;
}
form input[type=submit] {
  background: #ff5252;
}
    </style>
	</head>
	<body background="freelance.png">
<header><div class="left"></header>
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
	</body>
	</html>