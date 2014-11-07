<?php 
include "dbcon.php";
  $cmnt="";
  $msg="";
  $msg1="";
  $ins="";
  $success="";
  function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
if(isset($_POST['full_submit']))
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
		$quer="SELECT uid FROM details WHERE uid=$uid;";
		if((mysqli_query($con,$quer)->num_rows)<=0)
		{
		$uid=$_SESSION['uid'];
		$fname=test_input($_POST['fname']);
		$nname=test_input($_POST['nname']);
		$fcolor=$_POST['color'];
		$fdish=test_input($_POST['dish']);
		$fdrink=test_input($_POST['drink']);
		$fcrush=test_input($_POST['crush']);
		$fdress=test_input($_POST['dress']);
		$hobby=test_input($_POST['hobby']);
		$smate=test_input($_POST['smate']);
		$wish=test_input($_POST['wish']);
		$img_name=img_upld("profile","upload/".$nname."_dp");
		$ins="INSERT INTO details VALUES($uid,'$fname','$nname','$fcolor','$fdish','$fdrink','$fcrush','$fdress','$hobby','$smate','$wish','$img_name')";
		if($img_name=='Invalid'|| $img_name=='Error')
		{
			$msg="Please upload a Valid Image!!";
		}
		else
		{
			$ppl=$_POST['ppl'];
			$n=count($ppl);
			if(mysqli_query($con,$ins))
			{
				mysqli_query($con,"INSERT INTO comments(who,whom) VALUES($uid,1)");
				for($i=0;$i<=$n;$i++)
				mysqli_query($con,"INSERT INTO comments(who,whom) VALUES($uid,$ppl[$i])");
				$msg=1;
			}
			else
				$msg=0;
		}
		if($msg==1)
		{
			$success="Success";
			header("Location:fcomments.php");
		}
	}
}
?>