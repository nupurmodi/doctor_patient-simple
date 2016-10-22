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
          <li ><a href="admin_welcome.php">My details</a></li>
          <li class="selected"><a href="viewdoc.php">View Doctors</a></li>
          <li><a href="viewpatient.php">View Patients</a></li>
		  <li><a href="searchdonor_admin.php">Search donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>Doctors</strong></h1>

	<?php
include("mysqlcon.php");
   $query="SELECT * FROM doctor ";
   
 $selectRes = mysqli_query( $con,$query );       
 while($row = mysqli_fetch_assoc( $selectRes )) {
 $stime=date('h:i A',strtotime($row['start_time']));
  $etime=date('h:i A',strtotime($row['end_time']));
	$days=[0=>'Monday',1=>'Tuesday',2=>'Wednesday',3=>'Thursday',4=>'Friday',5=>'Saturday',6=>'Sunday'];
	$sday=$days[$row['start_day']];
	$eday=$days[$row['end_day']];

  ?>
    <div style="min-height:250px;width:400px;border:2px ridge #025587 ;border-radius:15%;margin-left:200px;margin-top:10px;padding-top:20px;padding-left:50px;font-size:15px">
		<p> Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_id'] ?></br>
		 Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['doctor_name'] ?></br>
		 Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_address'] ?></br>
		 Contact No.:&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_contact'] ?></br>
		 mail_id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['doctor_email'] ?><br>
		Available Days:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $sday."-".$eday ?><br>
		Avilable Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stime."-".$etime ?><br>
		Speciality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['speciality'] ?><br>
		Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['description'] ?></p>
		

</div>
 <?php }?>
    </div>
    
    <div id="content_footer"></div>
    <div id="footer">
			<a href="admin_welcome.php">My details</a>|
          <a href="viewdoc.php">View Doctors</a>|
          <a href="viewpatient.php">View Patients</a>|
		  <a href="searchdonor_admin.php">Search donor</a>|

		  <a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a>
    </div>
  </div>
</body>
</html>
