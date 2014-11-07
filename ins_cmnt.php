<?php
include "dbcon.php";
  $msg1="";
  $success="";
  $c="";
  function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
if(isset($_POST['c_submit']))
{
	function img_upld($name,$dest)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG","JPG");
		$temp = explode(".", $_FILES[$name]["name"]);
		$extn = end($temp);
		$dest=$dest.".".$extn;
		if ((($_FILES[$name]["type"] == "image/gif")
		|| ($_FILES[$name]["type"] == "image/jpeg")
		|| ($_FILES[$name]["type"] == "image/jpg")
		|| ($_FILES[$name]["type"] == "image/pjpeg")
		|| ($_FILES[$name]["type"] == "image/x-png")
		|| ($_FILES[$name]["type"] == "image/png"))
		&& ($_FILES[$name]["size"] >= 20)
		&& in_array($extn, $allowedExts))
  		{
  			if ($_FILES[$name]["error"] > 0)
   			{
	    		return "Error";
    		}
  			else
    		{
     			move_uploaded_file($_FILES[$name]["tmp_name"],$dest);
      			return $dest;
    		}
  		}
		else
  		{
  			return "Invalid";
  		}
	}
	$n=$_SESSION['num'];
	mysqli_query($con,"DELETE FROM comments WHERE who=$uid AND comment IS NULL");
	for($i=0;$i<$n;$i++)
	{
		$na=strtoupper(test_input($_POST['n_'.$i]));
		$c=test_input($_POST['c_'.$i]);
		$l=test_input($_POST['l_'.$i]);
		$h=test_input($_POST['h_'.$i]);
		$p=img_upld("p_".$i,"upload/".$_SESSION['uid']."to".$na);
		if($p=='Invalid')
			$p=NULL;
		elseif($p=='Error')
			$p=NULL;
		if($p!='Error')
		{
		$name=mysqli_fetch_array(mysqli_query($con,"SELECT uid FROM signup WHERE uname='$na'"),MYSQLI_ASSOC);
		$whom=$name['uid'];
		$ins1="INSERT INTO comments VALUES($uid,$whom,'$c','$l','$h','$p')";
		if(mysqli_query($con,$ins1))
			$msg1=1;
		else
			$msg1=0;
		}
	}
	if($msg1==1)
		header("location:inserting.php");
}
?>