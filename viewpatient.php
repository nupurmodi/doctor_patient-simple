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
          <li ><a href="viewdoc.php">View Doctors</a></li>
          <li class="selected"><a href="viewpatient.php">View Patients</a></li>
		  <li><a href="searchdonor_admin.php">Search donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>Patients</strong></h1>

	<?php
include("mysqlcon.php");
$query="SELECT patient_id,patient_name,patient_address,patient_contact,patient_email,patient_gender,patient_bloodgroup FROM patient  ";
 $selectRes = mysqli_query( $con,$query );
  while($row = mysqli_fetch_assoc( $selectRes )) {
$id=$row['patient_id'];
 $query1="SELECT organ from organ_donated_by_patient as o Where o.patient_id='$id'";
  $result=mysqli_query( $con,$query1 );

   

  ?>
    <div style="min-height:250px;width:400px;border:2px ridge #025587 ;border-radius:15%;margin-left:200px;margin-top:10px;padding-top:20px;padding-left:50px;font-size:15px">
		<p> Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_id'] ?></br>
		 Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_name'] ?></br>
		 Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['patient_address'] ?></br>
		 Contact No.:&nbsp;&nbsp;&nbsp; <?php echo $row['patient_contact'] ?></br>
		 mail_id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_email'] ?><br>
		Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_gender'] ?><br>
		BloodGroup:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_bloodgroup'] ?><br>
		Donated Organ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php while($row1 = mysqli_fetch_assoc( $result )){
			echo $row1['organ'].",";
		 }?><br>
		

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
