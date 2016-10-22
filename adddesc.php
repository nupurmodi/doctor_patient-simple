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
          <li ><a href="searchpatient.php">Search Patient</a></li>
		  <li class="selected"><a href="adddesc.php">Add Description</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<?php
include("mysqlcon.php");
 $id=$_SESSION["mail"];
$date=date('Y-m-d');
  $query="SELECT p.patient_id as pid ,appointment_id as aidt FROM patient as p,book_appointment as b,doctor as d where p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and doctor_email='$id' and date='$date'";
 $selectRes = mysqli_query( $con,$query );
 $num1= mysqli_num_rows($selectRes);

  ?>
    <div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>Patient Details</strong></h1><?php if($num1>0){?>
	    <form method="post" class="form_settings"  action="<?php echo$_SERVER['PHP_SELF'];?>" name="myForm2" >
	 <h4 style="margin-left:40%"><span>Patient_Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
      <select id="paid" name="paid" style="width:50px;">
	  <?php
	  
        while( $row2 = mysqli_fetch_assoc( $selectRes ) ){  
		?>
		<option value="<?php echo $row2['pid']?>"><?php echo $row2['pid']?></option>
		
        <?php 
		
			}
		
		?>
			</select></h4>
	<p style="padding-top: 15px; margin-left:260px"><input class="submit" type="submit" name="submit" value="Search" /></p>
	</form>
	 <?php 
		
			}else echo '<h1 style="text-align:center;"><strong>No Appointments Today.</strong></h1>';
		
		?>
	
<?php
         
		 if(isset($_POST['submit'])) {
			 $paid=$_POST['paid'];
$query="SELECT max(t.appointment_id) as aid FROM patient as p,doctor as d ,treatment as t,book_appointment as b where p.patient_id='$paid' and doctor_email='$id' and p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and b.appointment_id=t.appointment_id ";
 $selectRes = mysqli_query( $con,$query );
 $num= mysqli_num_rows($selectRes);
 $row = mysqli_fetch_assoc( $selectRes );
 $aid=$row['aid'];
   $query2="SELECT appointment_id as aidt FROM patient as p,book_appointment as b,doctor as d where p.patient_id=b.patient_id and d.doctor_id=b.doctor_id and doctor_email='$id' and date='$date' and p.patient_id='$paid'";
	 $selectRes2 = mysqli_query( $con,$query2 );
 $row2 = mysqli_fetch_assoc( $selectRes2 );
$aidt=$row2['aidt'];
if($num>0)
{
$query1="SELECT treatment_done as td,treatment_for as tf,note FROM treatment where appointment_id='$aid'";
 $selectRes1 = mysqli_query( $con,$query1 );

 $row1 = mysqli_fetch_assoc( $selectRes1 );


		 ?>
	 	<h1 style="text-align:center;"><strong>Add Description</strong></h1>
	<form method="post" class="form_settings"  action="adddesc2.php" name="myForm3" >
		 <p style="text-align:center"><span>Patient_Id:</span><?php echo $_POST['paid'];?></p>
			<p style="text-align:center"><span>Appointment_Id:</span>	
			<input type="text"  value="<?php echo $aidt;?>" maxlength="10" disabled /><br><br></p>
			<input type="hidden" name="aid" id="aid" value="<?php echo $aidt;?>"/>
		<p style="text-align:center"><span>Treatment_Done:</span>	
			<textarea  name="td" id="td"  maxlength="500" required="required" /><?php echo $row1['td']?></textarea><br><br></p>
		<p style="text-align:center"><span>Treatment_For:</span>	
			<textarea  name="tf" id="tf"  maxlength="500" required="required" /><?php echo $row1['tf']?></textarea><br><br></p>
		<p style="text-align:center"><span>Treatment_Note:</span>	
			<textarea  name="note" id="note" maxlength="500" required="required" /><?php echo $row1['note']?></textarea><br><br></p>
			<p style="padding-top: 15px; margin-left:260px"><input class="submit" type="submit" name="submit1" value="Add Description" /></p>

	
	</form>
		 <?php }else {?>
		 <h1 style="text-align:center;"><strong>Add Description</strong></h1>
	<form method="post" class="form_settings"  action="adddecs3.php" name="myForm3" >
		 <h4 style="margin-left:40%"><span>Patient_Id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $_POST['paid'];?></h4>
<p style="text-align:center"><span>Patient_Id:</span><?php echo $_POST['paid'];?></p>
			<p style="text-align:center"><span>Appointment_Id:</span>	
			<input type="text"  value="<?php echo $aidt;?>" maxlength="10" disabled /><br><br></p>
			<input type="hidden" name="aid" id="aid" value="<?php echo $aidt;?>"/>
		<p style="text-align:center"><span>Treatment_Done:</span>	
			<textarea  name="td" id="td"  maxlength="500" required="required" /></textarea><br><br></p>
		<p style="text-align:center"><span>Treatment_For:</span>	
			<textarea  name="tf" id="tf"  maxlength="500" required="required" /></textarea><br><br></p>
		<p style="text-align:center"><span>Treatment_Note:</span>	
			<textarea  name="note" id="note" maxlength="500" required="required" /></textarea><br><br></p>
			<p style="padding-top: 15px; margin-left:260px"><input class="submit" type="submit" name="submit1" value="Add Description" /></p>

	
	</form>
		 <?php }}?>
		
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
