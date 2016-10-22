<?php
include("authd.php");
 include("mysqlcon.php");
 if(isset($_POST['submit1']))
 {$aid=$_POST['aid'];
$td=$_POST['td'];
$tf=$_POST['tf'];
$note=$_POST['note'];
$sqlinsert="INSERT INTO treatment(appointment_id,treatment_done,treatment_for,note) VALUES ('$aid','$td','$tf','$note')";
 if(!mysqli_query($con,$sqlinsert))
 {die('error inserting new record'.mysqli_error($con)) ;
 exit();}
  
 else
{
	 echo"<script>alert('Description Added!');</script>";
header("Refresh:0; url=adddesc.php");
 }
 }
 
 
?>