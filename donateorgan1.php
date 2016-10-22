<?php
include("authp.php");
 include("mysqlcon.php");
$organ=$_POST['organ'];
 $id=$_SESSION['mail']; 
$query="SELECT * FROM organ_donated_by_patient Where patient_id=(select patient_id from patient where patient_email = '$id') and organ='$organ'";
$selectRes = mysqli_query( $con,$query );
 $num= mysqli_num_rows($selectRes);
 if($num==0){

$sqlinsert="INSERT INTO organ_donated_by_patient(patient_id,organ) VALUES ((select patient_id from patient where patient_email = '$id'),'$organ')";
 if(!mysqli_query($con,$sqlinsert))
	 die('error inserting new record') ;
	  
  
 else
{
	 echo"<script>alert('Thankyou for regestration!');</script>";
header("Refresh:0; url=patient_welcome.php");
 }}
 else{
	 echo"<script>alert('Already regestered!');</script>";
header("Refresh:0; url=patient_welcome.php");

 }
 
?>