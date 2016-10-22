
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
$bgroup=$_POST["bgroup"];

$address = mysqli_real_escape_string($con,$address);

$search="SELECT patient_email FROM patient WHERE patient_email='$email'";
$result = mysqli_query($con,$search);

        $num= mysqli_num_rows($result);
		if(!strcmp($_SESSION['mail'],$email)&& $num>1){
		
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=editdprofile.php");
		
		}else if($num!=0&&strcmp($_SESSION['mail'],$email)){
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=editdprofile.php");
		}

		
else{$sqlupdate="Update patient  SET patient_name='$name',patient_address='$address',patient_contact='$contact',patient_email='$email',patient_gender='$gender',patient_bloodgroup='$bgroup' where patient_email='$id'";
if(!mysqli_query($con,$sqlupdate)){
	 die('error updating  record'.mysqli_error($con)) ;
	 exit();
			}
			$_SESSION['mail']=$email;
						echo '<script>alert(" Changes Successfully Saved!!");</script>';

				header("refresh:0;url=patient_welcome.php");






mysqli_close($con);}
	
}else echo "cwacaw";
?>
