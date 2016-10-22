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
<script>function ask(){
	y=confirm('confirm to cancel? ');
	return y;
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
          <li ><a href="patient_welcome.php">My details</a></li>
          <li><a href="book_appoint.php">Book Appointment</a></li>
          <li class="selected"><a href="view_appoint.php">View Appointment</a></li>
		  <li><a href="searchdoctor.php">Search Doctor</a></li>
		  <li><a href="donateorgan.php">Donate Organ</a></li>
		  <li><a href="searchdonor.php">Search Donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php   include("mysqlcon.php");
 $id=$_SESSION['mail'];
$tdate=date('Y-m-d');			

   $query="SELECT date_format(date,'%d/%m/%y')as date,appointment_id,d.doctor_id,doctor_name,speciality,doctor_contact,doctor_email,time FROM patient as p,doctor as d,book_appointment as b where  patient_email='$id' and d.doctor_id=b.doctor_id  and p.patient_id=b.patient_id and date>='$tdate'";
 $selectRes = mysqli_query( $con,$query );
 $num= mysqli_num_rows($selectRes);

  ?>
    <div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>My Appointments</strong></h1>
      <table style="width:100%; border-spacing:0; margin-top:30px;">
	  <?php
	  if($num>0){
	     echo"<tr><th>Appintment<br>Id</th><th>Doctor<br>Id</th><th>Doctor<br>Name</th><th>Speciality</th><th>Doctor<br>Contact</th><th>Doctor<br>Email</th><th>On</th><th>At</th><th>Cancel</th></tr>";
        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{	$time=date('h:i a',strtotime($row['time']));
			echo'<form name="form1"  class="form_settings" action="deleteappointment.php" method="post">';
			echo'<input type="hidden" name="appointment_id" value='.$row["appointment_id"].'>';
     echo"<tr><td>{$row['appointment_id']}</td><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$row['speciality']}</td><td>{$row['doctor_contact']}</td><td>{$row['doctor_email']}</td><td>{$row['date']}</td><td>{$time}</td><td><input type='submit' class='submit2' name='submit' value='cancel' onclick='return ask()'></td></tr>";
	 echo"</form>";
	 }}
	  else echo  "<h1>No New Appointments </h1>";
		?>
        </table>
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
