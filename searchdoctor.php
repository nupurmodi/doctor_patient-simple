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
		  <li ><a href="book_appoint.php">Book Appointment</a></li>
			<li><a href="view_appoint.php">View Appointment</a></li>
		  <li class="selected"><a href="searchdoctor.php">Search Doctor</a></li>
		  <li><a href="donateorgan.php">Donate Organ</a></li>
		  <li><a href="searchdonor.php">Search Donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content" style="min-height:400px;">
	
			<?php
include("mysqlcon.php");
 $id=$_SESSION['mail']; 
 
  ?>
  
		 <form action="<?php echo$_SERVER['PHP_SELF'];?>" class="form_settings" method="post">
          
            <h4><span  style="margin-left:25%;text-align:left; color:black">Category:&nbsp;&nbsp;</span><select id="name" name="name">
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
			</select></h4>
	
            <p style="padding-top: 25px ;margin-left:30%"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="Search" /></p>
          
        </form>
		<?php
		 echo'<table style="width:100%; border-spacing:0; text-align:center">';
         
		 if(isset($_POST['submit']))
		 {
			  $speciality=$_POST['name'];
			    $query="SELECT doctor_id,doctor_name,speciality,doctor_email,doctor_address,doctor_contact,start_day,end_day,start_time,end_time,description FROM doctor where speciality='$speciality' ";
                 $selectRes = mysqli_query( $con,$query );
				  $num= mysqli_num_rows($selectRes);
				  if($num>0)
				  {while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
			$stime=date('h:i a',strtotime($row['start_time']));
  $etime=date('h:i a',strtotime($row['end_time']));
	$days=[0=>'Monday',1=>'Tuesday',2=>'Wednesday',3=>'Thursday',4=>'Friday',5=>'Saturday',6=>'Sunday'];
	$sday=$days[$row['start_day']];
	$eday=$days[$row['end_day']];?>
	<div style="min-height:250px;width:400px;border:2px ridge #025587 ;border-radius:15%;margin-left:200px;margin-top:10px;padding-top:20px;padding-left:50px;font-size:15px">
		<p>Doctor Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['doctor_id'] ?></br>
		Doctor Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['doctor_name'] ?></br>
		Doctor Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_address'] ?></br>
		Doctor Contact No.:  <?php echo $row['doctor_contact'] ?></br>
		Doctor mail_id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['doctor_email'] ?><br>
		Available Days:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <?php echo $sday."-".$eday ?><br>
		Avilable Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stime."-".$etime ?><br>
		Speciality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $row['speciality'] ?><br>
		Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['description'] ?></p>
</div>
			
		<?php }
		 }
		 else echo "<h1 style='text-align:center;'><strong>No doctor Available</strong></h1>";;
		 }
	
        echo'</table>';
		?>
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
