<html>
<head><title>Registration Form</title>
<link rel="stylesheet" href="css/emp_style.css">
</head>
<body background="freelance.png">
<form method="post" action="employerreg.php" class="form1">
<header>Employer Registration Form</header>
<label>Full name<span></span></label><input type ="text" name="empname" required>
<label>Email address<span></span></label></th><td><input type ="text" name="empemail" required>
<label>Password<span></span></label></th><td><input type ="password" name="emppass" id="pass1" required>
<label>Confirm Password<span></span></label></th><td><input type ="password" name="empconpass" id="pass2"
 onkeyup="checkPass(); return false;" required>
<label>Contact Number<span></span></label></th><td><input type ="text" name="empcontact" required>				
<label>Description<span></span></label><input type="text" name="empdes" required>
<input type="submit" value="Sign Up" name="empsignup" id="isub">
</form>
<form method="post" action="studentreg.php" class="form2">
<header>Student Registration Form</header>
<label>Full name</label><input type ="text" name="stuname" required>
<label>Email address</label><input type ="text" name="stuemail" required>
<label>Password</label><input type ="password" name="stupass" id="std_pass1" required>
<label>Confirm Password</label><input type="password" name="stuconpass" id="std_pass2" 
onkeyup="stdPass(); return false;" required></td></tr>
<label>Location</label><input type="text" name="stulocation" required>
<label>Skills</label><input type="text" name="skill" required> 			
<label>Work experience</label><input type="text" name="std_exp" required>
<label>Educational attainment</label><input type="text" name="std_edu" required>
<input type="submit" value="Sign Up" name="stusignup">
</form>
<script language="javascript" type="text/javascript"> 

function checkPass()
{
   
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
  


    var pmatch = "#66cc66";
    var punmatch = "#ff6666";
   
    if(pass1.value == pass2.value){
       
        pass2.style.backgroundColor = pmatch;
        message.style.color = pmatch;
     
    }else{
        
        pass2.style.backgroundColor = punmatch;
        message.style.color = punmatch;
        
    }
}  
function stdPass()
{
   
    var pass1 = document.getElementById('std_pass1');
    var pass2 = document.getElementById('std_pass2');
  


    var pmatch = "#66cc66";
    var punmatch = "#ff6666";
   
    if(pass1.value == pass2.value){
       
        pass2.style.backgroundColor = pmatch;
        message.style.color = pmatch;
     
    }else{
        
        pass2.style.backgroundColor = punmatch;
        message.style.color = punmatch;
        
    }
}  
</script>
</body>
</html>
</body>
</html>