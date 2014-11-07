<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="vstyle.css">
<?php
include "v_vars.php";
?>
<title><?php echo $uname."'s ";?>home</title>
<?php require "upload.php"; ?>
</head>
<body>
<style>
	#me
	{
		background:url(<?php echo $me['dp'];?>)no-repeat center; 
		background-size:contain;
	}
	#strip
	{
		background:<?php echo $fcolor['color']?>;
	}
	#nav li a:hover
	{
		background:<?php echo $fcolor['color'];?>;
		color:<?php echo $tcolor;?>;
	}
	#nav .active
	{
		background:<?php echo $fcolor['color']?>;
		color:<?php echo $tcolor;?>;	
	}
</style>
<script type="text/javascript">
function rem(val)
{
	var c=confirm("Do you really wanna remove this post??");
	if(c)
	{
		var obj=document.getElementById('remove');
		obj.value=val;
		window.location.href=("vremove.php?val="+val);
	}
}
</script>
<div id="header">
	<a href="home.php"><div id="me"><p>ME!</p></div></a>
	<div id="nav_bar">
    <ul id="nav">
	<li><a href="vhome.php" class="active">Home</a></li>
	<li><a href="vgallery.php">Gallery</a></li>
	<li><a href="vcomments.php">Comments</a></li>
    <li><a href="vfriends.php">Friends</a></li>
	</ul>
    </div>    
    </div>
    <div id="content">
    <div id="strip"><input type="hidden" id="remove" name="remove" value=""/></div>
        <div id="p_pic" style="background:url(<?php echo $pic['dp'];?>) no-repeat center; background-size:cover;">
        </div>
        <div id="comment"></div>
        
    </div>
    <div id="upload">
    <center>
    <p style="margin-top:15px;">Write on <?php echo $uname."'s ";?>wall</p></center>
    <form method="POST" name="mem" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <textarea name="desc" id="desc" placeholder="Write an event.."></textarea><br>
    <div id="photo"><input type="file" name="photo" title="Upload a image"></div>
    <div id="video"><input type="file" name="video" title="Upload a video"></div>
    <span class="error"><?php echo $msg; ?></span>
    <br>
    <div id="p_btn"><input type="submit" id="p_btn" value="Post" name="upload"></div>
    </form>	
    </div>
    <?php
	$upld=mysqli_query($con,"SELECT * FROM upload WHERE uid=$uid");
	while($rows=mysqli_fetch_row($upld))
	{
		if($rows[4]!=NULL)
		{
			echo "<div class='pic'><div id='strip'></div>
			<div id='rem' title='Remove Post!' onClick='rem($rows[0])'></div>
			<center><p>$rows[3]</p>
			<img src='$rows[4]' width='400' height='auto'>
			<br><span id='upld'>Uploaded by <b>$uname</b> on: $rows[6]</span>
			</center>
			</div>\n";
		}
		if($rows[5]!=NULL)
		{
			echo "<div class='vid'><div id='strip'></div>
			<div id='rem' title='Remove Post!' onClick='rem($rows[0])'></div>
			<center><p>$rows[3]</p>
			<video width='400' height='auto' style='border:1px solid black;' poster='images/logo.PNG' controls>
			<source src='$rows[5]' type='video/mp4'>
			Video not supported in this browser!!
			</video>
			<br><span id='upld'>Uploaded by <b>$uname</b> on: $rows[6]</span>
			</center>
			</div>\n";
		}
	}
	 ?>
</body>
</html>