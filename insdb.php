
<?php

if(isset($_POST["submit"]))
{include("mysqlcon.php");
$name=$_POST["name"];
$address=$_POST["address"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$password=md5($_POST["password"]);
$gender=$_POST["Gender"];
$bgroup=$_POST["bgroup"];
$address = mysqli_real_escape_string($con,$address);

$search="SELECT patient_email FROM patient WHERE patient_email='$email'";
$result = mysqli_query($con,$search);

        $num= mysqli_num_rows($result);
		if($num!=0){
			echo '<script>alert("This Email_id is already in use!!!!TRY NEW!!");</script>';

			header("refresh:0;url=signup.php");
		}
		
else{$sqlinsert="INSERT INTO patient(patient_name,patient_address,patient_contact,patient_email,patient_password,patient_gender,patient_bloodgroup) VALUES ('$name','$address','$contact','$email','$password','$gender','$bgroup')";
if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert("Successfully Signed Up!!Now You Can Log In");</script>';

				header("refresh:0;url=patient.php");






mysqli_close($con);}
	
}
?>
