<?php
include "dbcon.php";
session_start();
/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */
if(!isset($_SESSION['img']))
{
	header("Location:loginsuccess.php");
}
else
{
	$img_quality = 900;
	$src = $_SESSION['img'];
	if(exif_imagetype($src)==IMAGETYPE_JPEG)
	{
		$name=mysqli_fetch_array(mysqli_query($con,"SELECT uname FROM signup WHERE uid=$_SESSION[uid]"),MYSQLI_ASSOC);
		$dest="upload/".$name['uname']."_dp.JPG";
		$size=getimagesize($src);
		$mul;
		$rsr_org = imagecreatefromjpeg($src);
		if($size[0]>950)
		{
			if($size[0]<$size[1])
			{
				$mul=950/$size[1];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
			else
			{
				$mul=950/$size[0];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
		}
		imagejpeg($rsr_org, $src,$img_quality);
		if (isset($_POST['crop']))
		{
			$targ_w = $targ_h = 320;
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			imagejpeg($dst_r,$dest,$img_quality);
			if(mysqli_query($con,"UPDATE details SET dp='$dest' WHERE uid=$_SESSION[uid]"))
			{
				unlink($_SESSION['img']);
				unset($_SESSION['img']);
				header("Location:inserting.php");
			}
		}
	}
	elseif(exif_imagetype($src)==IMAGETYPE_PNG)
	{
		$name=mysqli_fetch_array(mysqli_query($con,"SELECT uname FROM signup WHERE uid=$_SESSION[uid]"),MYSQLI_ASSOC);
		$dest="upload/".$name['uname']."_dp.PNG";
		$size=getimagesize($src);
		$mul;
		$rsr_org = imagecreatefrompng($src);
		if($size[0]>950)
		{
			if($size[0]<$size[1])
			{
				$mul=950/$size[1];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
			else
			{
				$mul=950/$size[0];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
		}
		imagepng($rsr_org, $src,0);
		if (isset($_POST['crop']))
		{
			$targ_w = $targ_h = 320;
			$img_r = imagecreatefrompng($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			imagepng($dst_r,$dest,0);
			if(mysqli_query($con,"UPDATE details SET dp='$dest' WHERE uid=$_SESSION[uid]"))
			{
				unlink($_SESSION['img']);
				unset($_SESSION['img']);
				header("Location:inserting.php");
			}
		}
	}
	elseif(exif_imagetype($src)==IMAGETYPE_GIF)
	{
		$name=mysqli_fetch_array(mysqli_query($con,"SELECT uname FROM signup WHERE uid=$_SESSION[uid]"),MYSQLI_ASSOC);
		$dest="upload/".$name['uname']."_dp.GIF";
		$size=getimagesize($src);
		$mul;
		$rsr_org = imagecreatefromgif($src);
		if($size[0]>950)
		{
			if($size[0]<$size[1])
			{
				$mul=950/$size[1];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
			else
			{
				$mul=950/$size[0];
				$size[1]*=$mul;
				$size[0]*=$mul;
				$rsr_org = imagescale($rsr_org, $size[0],$size[1]);
			}
		}
		imagegif($rsr_org, $src,$img_quality);
		if (isset($_POST['crop']))
		{
			$targ_w = $targ_h = 320;
			$img_r = imagecreatefromgif($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			imagegif($dst_r,$dest,$img_quality);
			if(mysqli_query($con,"UPDATE details SET dp='$dest' WHERE uid=$_SESSION[uid]"))
			{
				unlink($_SESSION['img']);
				unset($_SESSION['img']);
				header("Location:inserting.php");
			}
		}
	}
}
// If not then, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile Pic</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
  <script src="js/jquery.color.js"></script>
<script type="text/javascript">
  jQuery(function($){

    var api;

    $('#cropbox').Jcrop({
	aspectRatio: 1,
      onSelect: updateCoords,
      // start off with jcrop-light class
      bgOpacity: 0.5,
      bgColor: 'white',
      addClass: 'jcrop-light'
    },function(){
      api = this;
      api.setSelect([100,50,130+350,65+285]);
      api.setOptions({ bgFade: true });
      api.ui.selection.addClass('jcrop-selection');
    });

    $('#buttonbar').on('click','button',function(e){
      var $t = $(this), $g = $t.closest('.btn-group');
      $g.find('button.active').removeClass('active');
      $t.addClass('active');
      $g.find('[data-setclass]').each(function(){
      });
    });
  });
function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };
</script>
  <link rel="shortcut icon" href="my_icon.ico">
  <link rel="stylesheet" href="files/main.css" type="text/css" />
  <link rel="stylesheet" href="files/demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
</head>
<body>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<center><div class="page-header">
<h1>Select your Profile Pic!</h1>
</div>
		<!-- This is the image we're attaching Jcrop to -->
		<img src="<?php echo $_SESSION['img']; ?>" id="cropbox" width="auto" height="auto" />

		<!-- This is the form that our event handler fills -->
		<form action="crop.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Select" name="crop" class="btn btn-large btn-inverse" />
		</form>
		</center>
	</div>
	</div>
	</div>
	</div>
	</body>

</html>
