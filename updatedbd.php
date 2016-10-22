
<?php
include("authd.php");
if(isset($_POST["edit"]))
{include("mysqlcon.php");
 $id=$_SESSION["mail"];

$name=$_POST["name"];
$address=$_POST["address"];
$contact=$_POST["contact"];
$email=$_POST["email"];
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
		if(!strcmp($_SESSION['mail'],$email)&& $num>1){
		
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=editdprofile.php");
		
		}else if($num!=0&&strcmp($_SESSION['mail'],$email)){
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=editdprofile.php");
		}

		
else{$sqlupdate="Update doctor  SET doctor_name='$name',doctor_address='$address',doctor_contact='$contact',doctor_email='$email',doctor_gender='$gender',speciality='$category',start_day='$sday',end_day='$eday',start_time='$stime2',end_time='$etime2',description='$desc' where doctor_email='$id'";
if(!mysqli_query($con,$sqlupdate)){
	 die('error updating  record'.mysqli_error($con)) ;
	 exit();
			}
			$_SESSION['mail']=$email;
						echo '<script>alert(" Changes Successfully Saved!!");</script>';

				header("refresh:0;url=doctor_welcome.php");






mysqli_close($con);}
	
}else echo "cwacaw";
?>
