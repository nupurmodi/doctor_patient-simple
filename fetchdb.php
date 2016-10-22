
<?php
include("mysqlcon.php");
if(isset($_POST["submit"])){
	$admin="admin@gmail.com";
	$adp="siyaram";
 
$id=$_POST['email'];
  $pwd=md5($_POST["password"]);
  if(!strcmp($id,$admin) && !strcmp($pwd,$adp))
  {		session_start();
	$_SESSION["mail"]=$admin;

    
	  header("Location:admin_main.php");
  }
  
 else{ $query="SELECT patient_email,patient_password FROM patient WHERE patient_email='$id' and patient_password='$pwd'";
  
		$result = mysqli_query($con,$query);

        $num= mysqli_num_rows($result);
		if($num==1)
		{	
		session_start();
		$_SESSION['mail']=$id;

		header("Location:patient_welcome.php");}
		else {
		
		echo '<script>alert("Invalid Username Or Password");</script>';
		header("refresh:0;url=patient.php");
       
		//echo "<script>setTimeout(function(){window.location.href='login.php'},100);</script>";
 }
 }
}
mysqli_close($con)
?>
