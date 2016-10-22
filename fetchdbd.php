
<?php
include("mysqlcon.php");
if(isset($_POST["submit"])){
	$admin="admin@gmail.com";
	$adp="siyaram";
 
$id=$_POST['email'];
$pwd2=$_POST['password'];
  $pwd=md5($_POST['password']);
  if(!strcmp($id,$admin) && !strcmp($pwd2,$adp))
  {		session_start();
	$_SESSION["mail"]=$admin;

    
	  header("Location:admin_welcome.php");
  }
  
 else{ $query="SELECT doctor_email,doctor_password FROM doctor WHERE doctor_email='$id' and doctor_password='$pwd'";
  
		$result = mysqli_query($con,$query);

        $num= mysqli_num_rows($result);
		if($num==1)
		{	
		session_start();
		$_SESSION["mail"]=$id;

		header("Location:doctor_welcome.php");}
		else {
		
		echo '<script>alert("Invalid Username Or Password");</script>';
		header("refresh:0;url=doctor.php");
       
		//echo "<script>setTimeout(function(){window.location.href='login.php'},100);</script>";
 }
 }
}
mysqli_close($con)
?>
