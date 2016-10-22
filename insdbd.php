
<?php

if(isset($_POST["submit"]))
{include("mysqlcon.php");
$name=$_POST["name"];
$address=$_POST["address"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$password=md5($_POST["password"]);
$gender=$_POST["Gender"];
$sday=$_POST["sday"];
$eday=$_POST["eday"];
$stime=$_POST["stime"];
			  $stime2  = date("H:i", strtotime($stime)).":00";
$etime=$_POST["etime"];
			  $etime2  = date("H:i", strtotime($etime)).":00";
$category=$_POST["category"];
$desc=$_POST["desc"];
$desc = mysqli_real_escape_string($con,$desc);
			 $address = mysqli_real_escape_string($con,$address);

$search="SELECT doctor_email FROM doctor WHERE doctor_email='$email'";
$result = mysqli_query($con,$search);

        $num= mysqli_num_rows($result);
		if($num!=0){
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=signupd.php");
		}
		
else{$sqlinsert="INSERT INTO doctor_dummy(doctor_name,doctor_address,doctor_contact,doctor_email,doctor_password,doctor_gender,speciality,start_day,end_day,start_time,end_time,description) VALUES ('$name','$address','$contact','$email','$password','$gender','$category','$sday','$eday','$stime2','$etime2','$desc')";
if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert("Successfully Signed Up!!");</script>';

				header("refresh:0;url=doctor.php");






mysqli_close($con);}
	
}
?>
