<?php
session_start();
if(!isset($_SESSION["mail"])){
echo '<script>alert("YOU ARE NOT LOGGED IN....\nYOU HAVE TO LOGIN AGAIN");</script>';
header("refresh:0;url=doctor.php");
exit(); }
?>
