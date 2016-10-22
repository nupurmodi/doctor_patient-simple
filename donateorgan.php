<?php 
include("authp.php");?>


<!DOCTYPE HTML>

<html>

<head>
  <title>Health_Care</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

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
          <li ><a href="patient_welcome.php">My details</a></li>
          <li><a href="book_appoint.php">Book Appointment</a></li>
          <li><a href="view_appoint.php">View Appointment</a></li>
		  <li><a href="searchdoctor.php">Search Doctor</a></li>
		  <li class="selected"><a href="donateorgan.php">Donate Organ</a></li>
		  <li><a href="searchdonor.php">Search Donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
       </ul>
      </div>
    </div>
    <div id="site_content" style="height:400px;">

  
		 <form action="donateorgan1.php" method="post"class="form_settings">
		 
            <h4> <span  style="margin-left:20%;text-align:left; color:black">Organ to be donated:</span><select id="organ" name="organ"><option value="eyes">Eyes</option><option value="ears">Ears</option><option value="heart">Heart</option></select></h4>
	
            <p style="padding-top: 15px;margin-left:30%;"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="Register" /></p>
        </form>
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
