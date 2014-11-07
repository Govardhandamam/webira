<?php 
session_start();
$_SESSION['visit']=$_GET['val'];
header("Location:vhome.php");
?>