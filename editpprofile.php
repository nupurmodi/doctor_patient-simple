<?php 
include("authp.php");
?>


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
          <h1><a href="patient_welcome.php">Health<span class="logo_colour">Care</span></a></h1>
          <h2>For a Healthy And Sound Life</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="patient_welcome.php">My details</a></li>
          <li><a href="book_appoint.php">Book Appointment</a></li>
          <li><a href="view_appoint.php">View Appointment</a></li>
		  <li><a href="searchdoctor.php">Search Doctor</a></li>
		  <li><a href="donateorgan.php">Donate Organ</a></li>
		  <li><a href="searchdonor.php">Search Donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php   include("mysqlcon.php");
 $id=$_SESSION['mail'];
   $query="SELECT patient_id,patient_name,patient_address,patient_contact,patient_email,patient_gender,patient_bloodgroup FROM patient where patient_email='$id' ";
 $selectRes = mysqli_query( $con,$query );
  $row = mysqli_fetch_assoc( $selectRes );
 
  ?>
    <div id="site_content" style="min-height:400px;">
	<div class="login" style="width:450px;position:relative;left:190px;">

	<h1 style="color:white; background-color:royalblue">Edit details</h1>
		<form method="post" class="form_settings" onsubmit="return validateform()" action="updatedbp.php" name="myForm2" >
		<p><span style="margin-left:15px; color:black;font-size:15px">My Name:</span><input type="text"  name="name" id="name" value="<?php echo $row['patient_name']?>" maxlength="20" required="required" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Address:</span><input type="text"  name="address" id="address" value="<?php echo $row['patient_address']?>" maxlength="50" required="required" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Contact:</span><input type="text"  name="contact" id="contact" value="<?php echo $row['patient_contact']?>" maxlength="10" required="required" pattern="[0-9]{10}" /><br><br>
		<span style="margin-left:15px; color:black;font-size:15px">My Email:</span><input type="email"  name="email" id="email" value="<?php echo $row['patient_email']?>" required="required" maxlength="20" /><br><br>
		</p>
		<div class="gender">
		<?php if(!strcmp($row['patient_gender'],"Male")){?>
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
			</div><br></br><br>
<p><span style="margin-left:15px; color:black;font-size:15px">Blood Group:</span>
			<select id="bgroup" name="bgroup">
			<option value="<?php echo $row['patient_bloodgroup']?>" selected><?php echo $row['patient_bloodgroup']?></option>
			<option value="A-" >A-</option>
			<option value="A+">A+</option>
			<option value="B-">B-</option>
			<option value="B+">B+</option>
			<option value="O-">O-</option>
			<option value="O+">O+</option>
			<option value="AB-">AB-</option>
			<option value="AB+">AB+</option></p>
			
		        <input type="submit" class="submit1" value="Edit" name="edit" onclick="return confirm('Confirm Changes? ');"/>
	</form>
</div>
	<div class="login" style="width:450px;position:relative;left:190px;">
	<h1 style="color:white; background-color:royalblue">Change Password</h1>
			<form method="post" class="form_settings" onsubmit="return validateform2()" action="updatepassp.php" name="myForm" >
	<input type="password" name="password" id="password" placeholder="Password*" required="required" maxlength="10" /><br><br>
		<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm Password*"  required="required" maxlength="10"/><br><br>
			<input type="submit" class="submit1" value="Change" name="edit" onclick="return confirm('Change Password? ');" /><br><br>

</form>
</div>

	</div>
    <div id="content_footer"></div>
    <div id="footer">
<a href="patient_welcome.php">My details</a>|
          <a href="book_appoint.php">Book Appointment</a></li>|
          <a href="view_appoint.php">View Appointment</a></li>|
		  <a href="searchdoctor.php">Search Doctor</a></li>|
		  <a href="donateorgan.php">Donate Organ</a></li>|
		  <a href="searchdonor.php">Search Donor</a></li>|
		  <a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a>
    </div>
  </div>
</body>
</html>
