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
          <li ><a href="viewpatient.php">View Patients</a></li>
		  <li class="selected"><a href="searchdonor_admin.php">Search donor</a></li>
		  <li ><a href="logout.php" onclick="return confirm('Do you want to logout? ');">Logout</a></li>
        </ul>
      </div>
    </div>
	<div id="site_content" style="min-height:400px;">
	<h1 style="text-align:center;"><strong>Search Donor</strong></h1>

	<?php
  include("mysqlcon.php");

 
  ?>
  
		 <form action="<?php echo$_SERVER['PHP_SELF'];?>" method="post" class="form_settings">
            <h4><span  style="margin-left:20%;text-align:left; color:black">Organ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
			<select id="name" name="name">
			<option value="eyes">Eyes</option>
			<option value="ears">Ears</option>
			<option value="heart">Heart</option></select></h4>
			
			<h4><span  style="margin-left:20%;text-align:left; color:black">Bloodgroup&nbsp;&nbsp;&nbsp;:</span>
			<select id="grp" name="grp">
			<option value="a-" selected>A-</option>
			<option value="a+">A+</option>
			<option value="b-">B-</option>
			<option value="b+">B+</option>
			<option value="o-">O-</option>
			<option value="o+">O+</option>
			<option value="ab-">AB-</option>
			<option value="ab+">AB+</option>
			</select></h4>
            <p style="padding-top: 15px;margin-left:30%"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="Search" /></p>
 
        </form>
		<?php
         
		 if(isset($_POST['submit']))
		 {	echo'<table style="width:100%; border-spacing:0; text-align:center">';
			  $organ=$_POST['name'];
			  $grp=$_POST['grp'];
			    $query="SELECT * FROM patient,organ_donated_by_patient where patient.patient_id=organ_donated_by_patient.patient_id and organ='$organ' and patient_bloodgroup='$grp'  ";
                 $selectRes = mysqli_query( $con,$query );
				  $num= mysqli_num_rows($selectRes);
				  if($num>0)

				  { echo"<h1 style='text-align:center'><strong>Donor's Info</strong></h1>";
          echo"<tr><th>Donor's Name</th><th>Gender</th><th>Donor's Address</th><th>Contactno</th><th>Email</th><th>Organ</th><th>Bloodgroup</th></tr>";

        while( $row = mysqli_fetch_assoc( $selectRes ) )
		{
			          echo"<tr><td>{$row['patient_name']}</td><td>{$row['patient_gender']}</td><td>{$row['patient_address']}</td><td>{$row['patient_contact']}</td><td>{$row['patient_email']}</td><td>{$row['organ']}</td><td>{$row['patient_bloodgroup']}</td></tr>";
		}
		 }
		 else{echo"<h1 style='text-align:center'><strong>No Donors Available</strong></h1>";}
		 
	
		 echo'</table>';}
		?>
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
