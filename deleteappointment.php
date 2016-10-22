
<?php
include("authp.php");
if(isset($_POST["submit"]))
{include("mysqlcon.php");
$id=$_POST["appointment_id"];
$delete="Delete  FROM book_appointment WHERE appointment_id='$id'";
if(!mysqli_query($con,$delete)){
	 die('error deleting appointment'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert("Appointment Canceled!!");</script>';

				header("refresh:0;url=view_appoint.php");






mysqli_close($con);}
	

?>
