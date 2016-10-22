
<?php
include("authd.php");
if(isset($_POST["edit"]))
{include("mysqlcon.php");
 $id=$_SESSION["mail"];

$password=md5($_POST["password"]);
$sqlupdate="Update doctor  SET doctor_password='$password' where doctor_email='$id'";
if(!mysqli_query($con,$sqlupdate)){
	 die('error updating  record'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert(" Password Successfully changed!!");</script>';

				header("refresh:0;url=doctor_welcome.php");






mysqli_close($con);}
	

?>
