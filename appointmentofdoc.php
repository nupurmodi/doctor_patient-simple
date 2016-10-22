<?php 
include("authd.php");

?>


<!DOCTYPE HTML>
<html>

<head>
  <title>health_care</title>
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
          <h1><a href="doctor_welcome.php">Health<span class="logo_colour">Care</span></a></h1>
          <h2>For a Healthy And Sound Life</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li ><a href="doctor_welcome.php">My details</a></li>
          <li class="selected"><a href="appointmentofdoc.php">My Appointments</a></li>
          <li><a href="searchpatient.php">Search Patient</a></li>
		  <li><a href="adddesc.php">Add Description</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php
include("mysqlcon.php");
 $id=$_SESSION["mail"];
 $tdate=date('Y-m-d');			

   $query="SELECT date_format(date,'%d/%m/%y')as date,appointment_id,p.patient_id,patient_name,patient_address,patient_contact,patient_email,time FROM patient as p,doctor as d,book_appointment as b where  doctor_email='$id' and d.doctor_id=b.doctor_id  and p.patient_id=b.patient_id and date>='$tdate'";
 $selectRes = mysqli_query( $con,$query );
 $num= mysqli_num_rows($selectRes);

  ?>
    <div id="site_content" style="height:400px;">
	<h1 style="text-align:center;"><strong>My Appointments</strong></h1>
      <table style="width:100%; border-spacing:0; margin-top:100px;">
	  <?php
	  if($num>0){
	     echo"<tr><th>Appintment<br>Id</th><th>Patient<br>Id</th><th>Patient<br>Name</th><th>Patient<br>Address</th><th>Patient<br>Contact</th><th>Patient<br>Email</th><th>On</th><th>At</th></tr>";
        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{	$time=date('h:i a',strtotime($row['time']));
          echo"<tr><td>{$row['appointment_id']}</td><td>{$row['patient_id']}</td><td>{$row['patient_name']}</td><td>{$row['patient_address']}</td><td>{$row['patient_contact']}</td><td>{$row['patient_email']}</td><td>{$row['date']}</td><td>{$time}</td></tr>";
	  }}
	  else echo  "<h1>No New Appointments </h1>";
		?>
        </table>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
<a href="doctor_welcome.php">My details</a>|
          <a href="appointmentofdoc.php">My Appointments</a>|
          <a href="searchpatient.php">Search Patient</a>|
		  <a href="adddesc.php">Add Description</a>|
		  <a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a>    </div>
  </div>
</body>
</html>
