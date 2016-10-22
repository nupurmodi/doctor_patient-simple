<!DOCTYPE HTML>
<html>

<head>
  <title>Health_Care</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>
<script>
function validateform(){
			
			var x2 = document.forms["myForm2"]["email"].value;
			var atpos = x2.indexOf("@");
			var dotpos = x2.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x2.length) {
				alert("Not a valid e-mail address");
				myForm2.email.focus();
				return false;
			}
			
			var z = document.getElementById("password").value;
        	if(z == null || z == ""||z.length<6){
        		alert("PASSWORD is must 6 characters long");
				myForm2.password.focus();
        		return false;
        	}
		
			
			
			return true;
		
			
			
}
	</script>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="indexi.php">Health<span class="logo_colour">Care</span></a></h1>
          <h2>For A Healthy And Sound Life.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="indexi.php">Home</a></li>
          <li ><a href="patient.php">Patient</a></li>
          <li class="selected"><a href="doctor.php">Doctor</a></li>
        </ul>
      </div>
    </div>
    <div id= "site_content" style="text-align:center; height:300px;">
	<div class="login">
	<h1 style="color:white; background-color:royalblue">LOGIN</h1>
    <form method="post" class="form_settings" name="myForm2" onsubmit="return validateform()" action="fetchdbd.php">
		<input type="email" id="email" name="email" placeholder="Username*" required="required" /><br><br>
		<input type="password"  id="password" name="password" placeholder="Password*" required="required" /><br><br>
        <button type="submit"  class="submit1" value="submit" name="submit" >Sign in</button>
    </form>
	<p style="margin-top:9px;margin-left:9px;text-align:left;">Haven't registered yet?<a href="signupd.php"><i><u>signup</u></i></p>
</div>
</div>
    <div id="content_footer"></div>
    <div id="footer">
      <a href="indexi.php">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="patient.php">Patient</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="doctor.php">Doctor</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
    </div>
  </div>
</body>
</html>
