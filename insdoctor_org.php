<?php include("authd.php");
include("mysqlcon.php");

$id=$_POST["id"];
$allow=$_POST["allow"];

if(strcmp($allow,"allow")==0)
{
	$sqlinsert="insert into doctor(doctor_name,doctor_address,doctor_contact,doctor_email,doctor_password,doctor_gender,speciality,start_day,end_day,start_time,end_time,description) select doctor_name,doctor_address,doctor_contact,doctor_email,doctor_password,doctor_gender,speciality,start_day,end_day,start_time,end_time,description from doctor_dummy where doctor_id='$id'";
	if(!mysqli_query($con,$sqlinsert)){
	 die('error inserting new record'.mysqli_error($con)) ;
	 exit();
			}
				echo '<script>alert("Successfully added!!");</script>';

}
		$delete="delete from doctor_dummy where doctor_id='$id'";
		if(!mysqli_query($con,$delete)){
	 die('error deleting new record'.mysqli_error($con)) ;
	 exit();
			}

				header("refresh:0;url=admin_welcome.php");

	
	
?>