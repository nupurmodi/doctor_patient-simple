<?php 
include("authd.php");?>


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
          <li ><a href="appointmentofdoc.php">My Appointments</a></li>
          <li class="selected"><a href="searchpatient.php">Search Patient</a></li>
		  <li><a href="adddesc.php">Add Description</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php
include("mysqlcon.php");
 $id=$_SESSION["mail"];

   $query="SELECT p.patient_id as pid FROM patient as p,book_appointment as b,doctor as d where p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and doctor_email='$id'";
 $selectRes = mysqli_query( $con,$query );
 $num1= mysqli_num_rows($selectRes);

  ?>
    <div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>Patient Details</strong></h1><?php if($num1>0){?>
	    <form method="post" class="form_settings"  action="<?php echo$_SERVER['PHP_SELF'];?>" name="myForm2" >
	 <h4 style="margin-left:40%"><span>Patient_Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <select id="paid" name="paid" style="width:50px;">
	  <?php
	  
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
		?>
		<option value="<?php echo $row['pid']?>"><?php echo $row['pid']?></option>
		
        <?php 
		
			}
		
		?>
			</select></h4>
	<p style="padding-top: 15px; margin-left:260px"><input class="submit" type="submit" name="submit" value="Search" /></p>
	 <?php 
		
			}else echo '<h1 style="text-align:center;"><strong>No Appointments Yet.</strong></h1>';
		
		?>
		
<?php
         
		 if(isset($_POST['submit']))
		 {	
		
		 echo'<table style="width:100%; border-spacing:0; text-align:center">';
			  $patient_id=$_POST['paid'];
			    $query="SELECT * FROM patient where patient_id='$patient_id'  ";
                 $selectRes = mysqli_query( $con,$query );

				   echo '<h1 style="text-align:center;"><strong>Patient Info</strong></h1>';
	     echo"<tr><th>Patient<br>Id</th><th>Patient<br>Name</th><th>Patient<br>Address</th><th>Patient<br>Contact_No</th><th>Patient<br>Email_Id</th></tr>";

        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
			          echo"<tr><td>{$row['patient_id']}</td><td>{$row['patient_name']}</td><td>{$row['patient_address']}</td><td>{$row['patient_contact']}</td><td>{$row['patient_email']}</td></tr>";
		}
		 echo'</table>';
		   $query="SELECT b.appointment_id as aid,treatment_done as td,treatment_for as tf,note,date_format(date,'%d/%m/%y') as date FROM patient as p,doctor as d ,treatment as t,book_appointment as b where p.patient_id='$patient_id' and doctor_email='$id' and p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and b.appointment_id=t.appointment_id ";
			 $selectRes = mysqli_query( $con,$query );
			$num= mysqli_num_rows($selectRes);
				  if($num>0)
				  {			echo'<table style="width:100%; border-spacing:0; text-align:center">';
						echo '<h1 style="text-align:center;"><strong>Treatment History</strong></h1>';
					echo"<tr><th>Appointment_Id</th><th>Treatment_Done</th><th>Treatment_For</th><th>Note</th><th>On day</th></tr>";
 while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
			          echo"<tr><td>{$row['aid']}</td><td>{$row['td']}</td><td>{$row['tf']}</td><td>{$row['note']}</td><td>{$row['date']}</td></tr>";
		}
		
			  
			  
					echo'</table>';  
				  }
				  else echo '<h1 style="text-align:center;"><strong>No History Available</strong></h1>';


		 }
		 
		?>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
<a href="doctor_welcome.php">My details</a>|
          <a href="appointmentofdoc.php">My Appointments</a>|
          <a href="searchpatient.php">Search Patient</a>|
		  <a href="adddesc.php">Add Description</a>|
		  <a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a>    
  </div>
</body>
</html>
