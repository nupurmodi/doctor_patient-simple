<?php
session_start();
session_unset();
if(session_destroy())
{echo '<script>alert("SUCESSFULLY LOGOUT ");</script>';

header("refresh:0;url=indexi.php");}

?>
