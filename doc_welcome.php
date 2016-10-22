<!DOCTYPE HTML>
<html>

<head>
  <title>colour_blue</title>
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
          <h1><a href="index.html">Health<span class="logo_colour">Care</span></a></h1>
          <h2>For a Healthy And Sound Life</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="#">Home</a></li>
          <li class="selected"><a href="#">Mydetails</a></li>
          <li><a href="#">MyAppointment</a></li>
          <li><a href="#">SearchPatients</a></li>
          <li><a href="#">AddDescription</a></li>
		  <li><a href="#">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php
$con = mysqli_connect("localhost","root","","doctor-patient");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
   $query="SELECT * FROM doctor where doctor_email='xyz@gmail.com' ";
 $selectRes = mysqli_query( $con,$query )
  ?>
    <div id="site_content" style="height:400px;">
	<h1 style="text-align:center;"><strong>My Details</strong></h1>
      <table style="width:100%; border-spacing:0; margin-top:100px;">
	  <?php
        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
          echo"<tr><th>MyId</th><th>Name</th><th>Address</th><th>Contact</th><th>Email</th><th>Available Days</th><th>Available Time</th><th>Speacaiity</th>
		  <th>Description</th></tr>";
          echo"<tr><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$row['doctor_address']}</td><td>{$row['doctor_contact']}</td><td>{$row['doctor_email']}</td><td>{$row['start_day']}-{$row['end_day']}</td><td>{$row['start_time']}-{$row['end_time']}</td><td>{$row['speciality']}</td><td>{$row['description']}</td></tr>";
		}
		?>
        </table>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a>
    </div>
  </div>
</body>
</html>
