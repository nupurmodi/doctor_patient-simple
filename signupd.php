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
		var x = document.getElementById("name").value;
		var re=/^[\w ]+$/;
		if (x == null || x == "") {
        		alert(" Name must be filled out");
				myForm2.name.focus();

        		return false;
   			}
		if(!re.test(x))
			{
				alert("Error:name contains INVALID characters");
				myForm2.name.focus();
				return false;
			}
			var y = document.getElementById("address").value;
		if (y == null || y == "") {
        		alert(" Address must be filled out");
				myForm2.address.focus();

        		return false;
   			}
			var y = document.getElementById("contact").value;
		if (y == null || y == ""||y.length<10) {
        		alert("Invalid Contact Number");
				myForm2.contact.focus();

        		return false;
   			}
			
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
			var w = document.getElementById("cpassword").value;
        	if(w == null || w== ""||w!=z){
        		alert("PASSWORD does not match");
				myForm2.cpassword.focus();
        		return false;
        	}
			var sday = document.getElementById("sday").value;
			var eday = document.getElementById("eday").value;
			if(sday>eday){
				alert("invalid available days");
				myForm2.sday.focus();
				return false;
			}
			var stime = document.getElementById("stime").value;
			var etime = document.getElementById("etime").value;
			var st=stime.split(" ");
			var s1=st[0];
			var nh=s1.split(":");
			var hours=nh[0];
			var min=nh[1];
			var ampm=st[1];
			var et=etime.split(" ");
			var h1=et[0];
			nh=h1.split(":");
			var hours1=nh[0];
			var min1=nh[1];
			var ampm1=et[1];
			if(ampm>ampm1) {
	alert("Please Enter A valid time slot");
	return false;
}else if(ampm==ampm1){
	if(hours>hours1){
	alert("Please Enter A valid time slot");
	return false;

	}else if(hours==hours1){
		if(min>=min1){
	alert("Please Enter A valid time slot");
	return false;

		}
	}
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
    <div id= "site_content" style="text-align:center;">
	<div class="login">
	<h1 style="color:white; background-color:royalblue">SIGN UP</h1>
    <form method="post" class="form_settings" onsubmit="return validateform()" action="insdbd.php" name="myForm2" >
		<input type="text"  name="name" id="name" placeholder="Your Name*" maxlength="20" required="required" /><br><br>
		<input type="text"  name="address" id="address" placeholder="Your address*" maxlength="50" required="required" /><br><br>
		<input type="text"  name="contact" id="contact" placeholder="Your contact*" maxlength="10" required="required" pattern="[0-9]{10}" /><br><br>
		<input type="email"  name="email" id="email" placeholder="Your Email_id*" required="required" maxlength="20" /><br><br>
		<div class="gender">
	<label for="Male" >Male</label>
	<input type="radio" class="radio" name="Gender" value="Male" id="Male" checked> 
	<label for="Female" style="margin-left:70px;" >Female</label>
	<input type="radio" class="radio" name="Gender" value="Female" id="Female">
	</div>
  	
  	
		<input type="password" name="password" id="password" placeholder="Password*" required="required" maxlength="10" /><br><br>
		<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm Password*"  required="required" maxlength="10"/><br><br>
		<p style="margin-left:45px;text-align:left; color:black">Available days<br>Start From:</p><select id="sday" name="sday">
			<option value="0" selected>Monday</option>
			<option value="1">Tuesday</option>
			<option value="2">Wednesday</option>
			<option value="3">Thursday</option>
			<option value="4">Friday</option>
			<option value="5">Saturday</option>
			<option value="6" >Sunday</option>
			</select></br></br>
		<p style="margin-left:45px;text-align:left; color:black">End On:</p><select id="eday" name="eday">
			<option value="0" selected>Monday</option>
			<option value="1">Tuesday</option>
			<option value="2">Wednesday</option>
			<option value="3">Thursday</option>
			<option value="4">Friday</option>
			<option value="5">Saturday</option>
			<option value="6" >Sunday</option>
			</select></br></br>
			<p style="margin-left:45px;text-align:left; color:black">Start Time:</p>
		<input type="text" name="stime" placeholder="hr(00-12):min(00/30) AM/PM" id="stime" required="required" pattern="^(0[1-9]|1[0-2]):(00|30) (AM|PM)?$" /><br><br>
		<p style="margin-left:45px;text-align:left; color:black">End Time:</p>
		<input type="text" name="etime" placeholder="hr(00-12):min(00/30) AM/PM" id="etime" required="required" pattern="^(0[1-9]|1[0-2]):(00|30) (AM|PM)?$" /><br><br>
	<p style="margin-left:45px;text-align:left; color:black">Category:</p><select id="category" name="category">
			<option value="Cardiologist" selected>Cardiologist</option>
			<option value="Dentist">Dentist</option>
			<option value="Dermatologist">Dermatologist</option>
			<option value="Gynecologist">Gynecologist</option>
			<option value="Neurologist">Neurologist</option>
			<option value="Obstetrician">Obstetrician</option>
			<option value="Orthologist">Orthologist</option>
			<option value="ENT specialist">ENT specialist</option>
			<option value="Pediatrician">Pediatrician</option>
			<option value="Physiologist">Physiologist</option>
			<option value="Psychiatrist">Psychiatrist</option>
			<option value="Surgeon">Surgeon</option>
			</select></br></br>
	
		
    	<textarea name="desc" id="desc" placeholder="Brief Info About Expereience*" required="required" maxlength="100"  ></textarea><br><br>
		<input type="submit" class="submit1" value="Reigster Here" name="submit" onclick="return confirm('Confirm Register? ');" />
    </form>
	<p style="margin-top:9px;margin-left:9px;text-align:left;">Have Already registered?<a href="patient.php"><i><u>Login here</u></i></p>
</div>
</div>
    <div id="content_footer"></div>
    <div id="footer">
      <a href="indexi.php">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="patient.php">Patient</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="doctor.php">Doctor</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    </div>
  </div>
</body>
</html>
