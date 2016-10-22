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
 $query1="SELECT organ from patient as p,organ_donated_by_patient as o Where o.patient_id=p.patient_id and patient_email='$id'";
  $result=mysqli_query( $con,$query1 );

  ?>
    <div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>My Details</strong></h1>
	  
     <div style="min-height:250px;width:400px;border:2px ridge #025587 ;border-radius:15%;margin-left:200px;margin-top:10px;padding-top:20px;padding-left:50px;font-size:15px">
		<p>My Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_id'] ?></br>
		My Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_name'] ?></br>
		My Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['patient_address'] ?></br>
		My Contact No.:&nbsp;&nbsp;&nbsp; <?php echo $row['patient_contact'] ?></br>
		My mail_id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_email'] ?><br>
		Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_gender'] ?><br>
		BloodGroup:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['patient_bloodgroup'] ?><br>
		Donated Organ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php while($row1 = mysqli_fetch_assoc( $result )){
			echo $row1['organ'].",";
		 }?><br>
		<form name="edit" action="editpprofile.php"method="post" class="form_settings" >
				 <button name="blogger_id" type="submit" class="submit"  value="submit" style="margin-left:30%;margin-bottom:10px"> Edit Details</button>
				 </form>


</div>

		<?php 
		$query="SELECT b.appointment_id as aid,d.doctor_name as dname,treatment_done as td,treatment_for as tf,note,date_format(date,'%d/%m/%y') as date FROM patient as p,doctor as d ,treatment as t,book_appointment as b where p.patient_email='$id'  and p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and b.appointment_id=t.appointment_id ";
			 $selectRes = mysqli_query( $con,$query );
			$num1= mysqli_num_rows($selectRes);
				  if($num1>0){?>
					<table style="width:100%; border-spacing:0; margin-top:20px;">
								<h1 style="text-align:center;"><strong>Treatment History</strong></h1>

	  <?php
	  echo"<tr><th>Appointment_Id</th><th>Doctor_Name</th><th>Treatment_Done</th><th>Treatment_For</th><th>Note</th><th>On day</th></tr>";

        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
		 echo"<tr><td>{$row['aid']}</td><td>{$row['dname']}</td><td>{$row['td']}</td><td>{$row['tf']}</td><td>{$row['note']}</td><td>{$row['date']}</td></tr>";
		}
		?>
        </table>
		
		
		
				  <?php }else echo '<h1 style="text-align:center;"><strong>No History Available</strong></h1>';?>
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
