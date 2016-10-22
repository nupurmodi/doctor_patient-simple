<?php 
include("authd.php");?>

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
function validateform2(){
	var z = document.getElementById("password").value;
        	if(z == null || z == ""||z.length<6){
        		alert("PASSWORD is must 6 characters long");
				myForm.password.focus();
        		return false;
        	}
			var w = document.getElementById("cpassword").value;
        	if(w == null || w== ""||w!=z){
        		alert("PASSWORD does not match");
				myForm.cpassword.focus();
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
          <h1><a href="doctor_welcome.php">Health<span class="logo_colour">Care</span></a></h1>
          <h2>For A Healthy And Sound Life.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="doctor_welcome.php">My details</a></li>
          <li><a href="appointmentofdoc.php">My Appointments</a></li>
          <li><a href="searchpatient.php">Search Patient</a></li>
		  <li><a href="adddesc.php">Add Description</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php
include("mysqlcon.php");
 $id=$_SESSION["mail"];
   $query="SELECT * FROM doctor where doctor_email='$id' ";
 $selectRes = mysqli_query( $con,$query );       $row = mysqli_fetch_assoc( $selectRes ) ;
 $stime=date('h:i A',strtotime($row['start_time']));
  $etime=date('h:i A',strtotime($row['end_time']));
	$days=[0=>'Monday',1=>'Tuesday',2=>'Wednesday',3=>'Thursday',4=>'Friday',5=>'Saturday',6=>'Sunday'];
	$sday=$days[$row['start_day']];
	$eday=$days[$row['end_day']];

  ?>
    <div id="site_content" style="min-height:400px;">
		<div class="login" style="width:450px;position:relative;left:190px;">

	<h1 style="color:white; background-color:royalblue">Edit details</h1>
		<form method="post" class="form_settings" onsubmit="return validateform()" action="updatedbd.php" name="myForm2" >
		<p><span style="margin-left:15px; color:black;font-size:15px">My Name:</span><input type="text"  name="name" id="name" value="<?php echo $row['doctor_name']?>" maxlength="20" required="required" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Address:</span><input type="text"  name="address" id="address" value="<?php echo $row['doctor_address']?>" maxlength="50" required="required" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Contact:</span><input type="text"  name="contact" id="contact" value="<?php echo $row['doctor_contact']?>" maxlength="10" required="required" pattern="[0-9]{10}" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Email:</span><input type="email"  name="email" id="email" value="<?php echo $row['doctor_email']?>" required="required" maxlength="20" /><br><br>
		</p>
		<div class="gender">
		<?php if(!strcmp($row['doctor_gender'],"Male")){?>
	<label for="Male" >Male</label>
	<input type="radio" class="radio" name="Gender" value="Male" id="Male" checked> 
	<label for="Female" style="margin-left:70px;" >Female</label>
	<input type="radio" class="radio" name="Gender" value="Female" id="Female">
		<?php }else{?>
		<label for="Male" >Male</label>
	<input type="radio" class="radio" name="Gender" value="Male" id="Male" > 
	<label for="Female" style="margin-left:70px;" >Female</label>
	<input type="radio" class="radio" name="Gender" value="Female" id="Female" checked>
	
		
		<?php } ?>
	</div><br><br>
  	
  	
		
		<p><span style="margin-left:15px; color:black;font-size:15px">Available days:</span><br></p>
		<p><span style="margin-left:15px; color:black;font-size:15px">Start From:</span>
		<select id="sday" name="sday">
			<option value="<?php echo $row['start_day']?>" selected><?php echo $sday?></option>
			<option value="0" >Monday</option>
			<option value="1">Tuesday</option>
			<option value="2">Wednesday</option>
			<option value="3">Thursday</option>
			<option value="4">Friday</option>
			<option value="5">Saturday</option>
			<option value="6" >Sunday</option>
			</select></br></br></p>
		<p><span style="margin-left:15px; color:black;font-size:15px">End On:</span><select id="eday" name="eday">
			<option value="<?php echo $row['end_day']?>" selected><?php echo $eday?></option>
			<option value="0" >Monday</option>
			<option value="1">Tuesday</option>
			<option value="2">Wednesday</option>
			<option value="3">Thursday</option>
			<option value="4">Friday</option>
			<option value="5">Saturday</option>
			<option value="6" >Sunday</option>
			</select></br></br></p>
			<p><span style="margin-left:15px; color:black;font-size:15px">Start Time:</span>
		<input type="text" name="stime" placeholder="hr(00-12):min(00/30) AM/PM" value="<?php echo $stime?>" id="stime" required="required" pattern="^(0[1-9]|1[0-2]):(00|30) (AM|PM)?$" /><br><br></p>
			<p><span style="margin-left:15px; color:black;font-size:15px">End Time:</span>
		<input type="text" name="etime" placeholder="hr(00-12):min(00/30) AM/PM" value="<?php echo $etime?>"id="etime" required="required" pattern="^(0[1-9]|1[0-2]):(00|30) (AM|PM)?$" /><br><br></p>
				
			<p><span style="margin-left:15px; color:black;font-size:15px">Category:</span><select id="category" name="category">
			<option value="<?php echo $row['speciality']?>" ><?php echo $row['speciality']?></option>
			<option value="Cardiologist" >Cardiologist</option>
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
			</select></br></br></p>
	
					<p><span style="margin-left:15px; color:black;font-size:15px">Brief Info About Expereience:</span></p><br><br>
    	<textarea name="desc" id="desc" placeholder="Brief Info About Expereience*" required="required" maxlength="100"  ><?php echo $row['description']?></textarea><br><br>
		<input type="submit" class="submit1" value="Edit" name="edit" onclick="return confirm('Confirm Edit? ');" /><br><br>
    </form>

</div>
<div class="login" style="width:450px;position:relative;left:190px;">
	<h1 style="color:white; background-color:royalblue">Change Password</h1>
			<form method="post" class="form_settings" onsubmit="return validateform2()" action="updatepassd.php" name="myForm" >
	<input type="password" name="password" id="password" placeholder="Password*" required="required" maxlength="10" /><br><br>
		<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm Password*"  required="required" maxlength="10"/><br><br>
			<input type="submit" class="submit1" value="Change" name="edit" onclick="return confirm('Change Password? ');" /><br><br>

</form>
</div>
    </div>
    
    <div id="content_footer"></div>
    <div id="footer">
			<a href="doctor_welcome.php">My details</a>|
          <a href="appointmentofdoc.php">My Appointments</a>|
          <a href="searchpatient.php">Search Patient</a>|
		  <a href="adddesc.php">Add Description</a>|
		  <a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a>
    </div>
  </div>
</body>
</html>
