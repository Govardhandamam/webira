<?php
include "dbcon.php";
  $desc="";
  $msg="";
  $photo=NULL;
  $video=NULL;
  date_default_timezone_set("Asia/Kolkata");
  $time=date('D jS F Y g:i A');
  ini_set('max_execution_time', 300);
   function test_input($data)
	{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
	}
 function img_upld($name)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG","JPG");
		$temp = explode(".", $_FILES[$name]["name"]);
		$extn = end($temp);
		$dest="upload/$_SESSION[uid]_".date("jnY_His");
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
  function vid_upld($name)
	{
		$allowedExts = array("3gp", "MTS", "avi", "flv", "m4v","mkv","mppeg","mpg","mpe","mp4","wmv");
		$temp = explode(".", $_FILES[$name]["name"]);
		$extn = end($temp);
		//date_default_timezone_set("Asia/Kolkata");
		$outf=$_SESSION['uid']."_".date("jnY_His").".mp4";
		$temp=date("jnY_His").".".$extn;
		$dest="upload/".$outf;
		if(($_FILES[$name]["size"] >= 20)
		&& in_array($extn, $allowedExts))
  		{
  			if ($_FILES[$name]["error"] > 0)
   			{
	    		return "Error";
    		}
  			else
    		{
     			move_uploaded_file($_FILES[$name]["tmp_name"],"temp/".$temp);
				shell_exec("start /B ffmpeg -y -i temp/$temp -b 256k -vcodec libx264 upload/$outf &");
				unlink("temp/$temp");
      			return $dest;
    		}
  		}
		else
  		{
  			return "Invalid";
  		}
	}
if(isset($_POST['upload']))
{
	if(($_POST['desc']=="") && ($_FILES['photo']['name'])=="" && ($_FILES['video']['name'])=="")
	{
		$msg="<br>Please write something and attach a photo or a video!!";
	}
	elseif(($_POST['desc']=="") && ($_FILES['photo']['name']!="" || $_FILES['video']['name']!=""))
	{
		$msg="<br>Add a description for the photo or video!";
	}
	elseif(($_POST['desc'])!="")
	{
		$desc=test_input($_POST['desc']);
		if(($_FILES['photo']['name'])!="")
		{
			$photo=img_upld('photo');
			if($photo=="Invalid" || $photo=="Error")
			{
				$photo="ERR";
				$msg="<br>Invalid Image";
			}
		}
		if(($_FILES['video']['name'])!="")
		{
			$video=vid_upld('video');
			if($video=="Invalid" || $video=="Error")
			{
				$video="ERR";
				$msg="<br>Invalid video";
			}
		}
		if($_POST['desc']!="" && $photo!="ERR" && $video!="ERR")
		{
			if(isset($_SESSION['visit']))
				$whom=$_SESSION['visit'];
			else
				$whom=$_SESSION['uid'];
			$quer="INSERT INTO upload(uid,whom,descrip,photo,video,time) VALUES($_SESSION[uid],$whom,'$desc','$photo','$video','$time')";
			if(!mysqli_query($con,$quer))
			{
				unlink($photo);
				unlink($video);
				$msg="Error inserting into database!!";
			}
		}
	}
}
 ?>