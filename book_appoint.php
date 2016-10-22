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
<script>
function validateform(){
	
	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd
} 
if(mm<10){
    mm='0'+mm
} 
var hours=today.getHours();
var min=today.getMinutes();
var ampm=hours>=12? 'PM' : 'AM';
hours=hours%12;
min=min< 10 ? '0' + min :min;
var time=hours+':'+min;
var today = yyyy+'-'+mm+'-'+dd;
var date1=document.getElementById("date1").value;
if(today>date1) {
	alert("Please Enter A Future Date");
	return false;
}
else if(today==date1){var time1=document.getElementById("time1").value;
var str=time1.split(" ");
var h1=str[0];
var nh=h1.split(":");
var hours1=nh[0];
var min1=nh[1];
var ampm1=str[1];

if(ampm>ampm1) {
	alert("Please Enter A Future time");
	return false;
}else if(ampm==ampm1){
	if(hours>hours1){
	alert("Please Enter A Future time");
	return false;

	}else if(hours==hours1){
		if(min>=min1){
	alert("Please Enter A Future time");
	return false;

		}
	}
}
}

return true;
}
function ask(){
	y=confirm('confirm booking? ');
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
          <li class="selected"><a href="book_appoint.php">Book Appointment</a></li>
          <li><a href="view_appoint.php">View Appointment</a></li>
		  <li><a href="searchdoctor.php">Search Doctor</a></li>
		  <li><a href="donateorgan.php">Donate Organ</a></li>
		  <li><a href="searchdonor.php">Search Donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
		  </ul>
      </div>
    </div>
    <div id="site_content" style="min-height:400px;">
	
			<?php
			include("mysqlcon.php");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 
 
  ?>
  <h1 style="text-align:center;"><strong>Book Your Appointment</strong></h1>
  	 <form action="<?php echo$_SERVER['PHP_SELF'];?>" class="form_settings" method="post" onsubmit="return validateform();">
          
			<h4><span style="margin-left:25%;text-align:left; color:black">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="date" name="date1" id="date1"></h4><br>
			<h4><span style="margin-left:25%;text-align:left; color:black">Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="text" name="time1" placeholder="hr(00-12):min(00/30) AM/PM" id="time1" required="required" pattern="^(0[1-9]|1[0-2]):(00|30) (AM|PM)?$" /></h4><br><br>
	<h4><span style="margin-left:25%;text-align:left; color:black">Category:&nbsp;&nbsp;</span><select id="category" id="time1"name="category">
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
			</select></h4></br></br>
            <p style="padding-top: 15px ;margin-left:30%;"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="Book" /></p>
          
        </form>
		<?php
		 echo'<table style="width:100%; border-spacing:0;">';
         
		 if(isset($_POST['submit']))
		 {	$mail=$_SESSION['mail'];
			 $speciality=$_POST['category'];
			  $date=$_POST['date1'];
			  $date1=date('d-m-Y',strtotime($date));
			  $timestamp = strtotime($date);
			$day = date('l', $timestamp);
			  
			  $time=$_POST['time1'];
			  $time2  = date("H:i", strtotime($time)).":00";
			 
			$query2="SELECT p.patient_id FROM book_appointment as b,patient as p where  b.patient_id=p.patient_id and patient_email='$mail' and b.date='$date' and b.time='$time2'; ";
			$selectRes2 = mysqli_query( $con,$query2 );
				 if(!$selectRes2){
					     printf("Errormessage: %s\n", mysqli_error($con));exit();

				 }
				  $num3= mysqli_num_rows($selectRes2);
				 if($num3==0)
				 {
				
			    $query="SELECT doctor_id,doctor_name FROM doctor as d where WEEKDAY('$date')>=start_day and WEEKDAY('$date')<=end_day and '$time2'>=start_time and '$time2'<=end_time and speciality='$speciality'; ";
                 $selectRes = mysqli_query( $con,$query );
				 if(!$selectRes){
					     printf("Errormessage: %s\n", mysqli_error($con));exit();

				 }
				  $num= mysqli_num_rows($selectRes);
				  
 if($num>0){          
 echo"<tr><th>Doctor_Id</th><th>Doctor_name</th><th>Category</th><th>Date</th><th>Time</th><th>Book</th></tr>";
        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{	$id=$row['doctor_id'];
			$query1="SELECT * FROM book_appointment where doctor_id='$id'";
			$selectRes1 = mysqli_query( $con,$query1 );
			$num1= mysqli_num_rows($selectRes1);
			if($num1==0){//Doctor had never an appintment
			echo'<form name="form1" class="form_settings" action="insertappointment.php" method="post">';
			echo'<input type="hidden" name="doctor_id" value='.$row["doctor_id"].'>';
			echo'<input type="hidden" name="date" value='.$date.'>';
			echo'<input type="hidden" name="time" value='.$time2.'>';
          echo"<tr><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$speciality}</td><td>{$date1}</td><td>{$time}</td><td><input type='submit'	class='submit2' name='allow' value='book' onclick='return ask()'></td></tr>";
			echo"</form>";}
			else {
			$qu="SELECT * FROM book_appointment as b,patient as p where doctor_id='$id' and b.patient_id=p.patient_id and patient_email='$mail' and b.date='$date'";
			$result=mysqli_query($con,$qu);
			$no= mysqli_num_rows($result);
			if($no==0){//patient has no appointment with that doctor that day
				$query2="SELECT doctor_id FROM book_appointment as b where  b.doctor_id='$id' and b.date='$date' and b.time='$time2'; ";
				$selectRes2 = mysqli_query( $con,$query2 );
			$num2= mysqli_num_rows($selectRes2);
			if($num2==0){//doctor has no appointment on that time and day
				echo'<form name="form1"  class="form_settings" action="insertappointment.php" method="post">';
			echo'<input type="hidden" name="doctor_id" value='.$row["doctor_id"].'>';
			echo'<input type="hidden" name="date" value='.$date.'>';
			echo'<input type="hidden" name="time" value='.$time2.'>';
 
          echo"<tr><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$speciality}</td><td>{$date1}</td><td>{$time}</td><td><input type='submit' class='submit2' name='allow' value='book' onclick='return ask()';></td></tr>";
			echo"</form>";}
			else   echo"<tr><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$speciality}</td><td>{$date1}</td><td>{$time}</td><td style='color:red';>NOT AVAILABLE</td></tr>";
			}
			else   echo"<tr><td>{$row['doctor_id']}</td><td>{$row['doctor_name']}</td><td>{$speciality}</td><td>{$date1}</td><td>{$time}</td><td style='color:green';>Already have an <br>appointment On that day</td></tr>";


			}
		}
		 }else echo "<h1 style='text-align:center;'><strong>No doctor Available</strong></h1>";
		 }else {
		 		echo '<script>alert("You already have one appointment at this time.\nPlease choose another time");</script>';

				header("refresh:0;url=book_appoint.php");
		 }

		 
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
