
<?php
include("authd.php");
if(isset($_POST["edit"]))
{include("mysqlcon.php");
 $id=$_SESSION["mail"];

$password=md5($_POST["password"]);
$sqlupdate="Update patient SET patient_password='$password' where patient_email='$id'";
if(!mysqli_query($con,$sqlupdate)){
	 die('error updating  record'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert(" Password Successfully changed!!");</script>';

				header("refresh:0;url=patient_welcome.php");






mysqli_close($con);}
	

?>
