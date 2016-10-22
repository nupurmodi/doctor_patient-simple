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
 $stime=date('h:i a',strtotime($row['start_time']));
  $etime=date('h:i a',strtotime($row['end_time']));
	$days=[0=>'Monday',1=>'Tuesday',2=>'Wednesday',3=>'Thursday',4=>'Friday',5=>'Saturday',6=>'Sunday'];
	$sday=$days[$row['start_day']];
	$eday=$days[$row['end_day']];

  ?>
    <div id="site_content" style="height:400px;">
	<h1 style="text-align:center;"><strong>My Details</strong></h1>
<div style="min-height:250px;width:400px;border:2px ridge #025587 ;border-radius:15%;margin-left:200px;margin-top:10px;padding-top:20px;padding-left:50px;font-size:15px">
		<p>My Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_id'] ?></br>
		My Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['doctor_name'] ?></br>
		My Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_address'] ?></br>
		My Contact No.:&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_contact'] ?></br>
		My mail_id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['doctor_email'] ?><br>
		Available Days:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $sday."-".$eday ?><br>
		Avilable Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stime."-".$etime ?><br>
		Speciality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['speciality'] ?><br>
		Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['description'] ?></p>
		<form name="edit" action="editdprofile.php"method="post" class="form_settings" >
				 <button name="blogger_id" type="submit" class="submit"  value="submit"style="margin-left:30%;margin-bottom:10px"> Edit Details</button>
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
