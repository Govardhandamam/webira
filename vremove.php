<?php
include "dbcon.php";
  $upld=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM upload WHERE did=$_GET[val]"),MYSQLI_ASSOC);
  if(mysqli_query($con,"DELETE FROM upload WHERE did=$_GET[val]"))
  {
	  unlink($upld['photo']);
	  unlink($upld['video']);
	  header("Location:vhome.php");
  }
?>