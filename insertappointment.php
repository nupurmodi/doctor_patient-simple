
<?php 
include("authp.php");
if(isset($_POST["allow"]))
{include("mysqlcon.php");
$mail=$_SESSION['mail'];
$id=$_POST["doctor_id"];
$date=$_POST["date"];
$time=$_POST["time"];
$sqlinsert="INSERT INTO book_appointment(doctor_id,date,time,patient_id) VALUES ('$id','$date','$time',(SELECT patient_id FROM patient WHERE patient_email='$mail'))";
if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
						echo '<script>alert("Successfully Booked!!");</script>';

				header("refresh:0;url=book_appoint.php");






mysqli_close($con);
	
}
?>
