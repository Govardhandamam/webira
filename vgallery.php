<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="vstyle.css">
<?php
include "v_vars.php";
?>
<title><?php echo $uname."'s ";?>gallery</title>
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
<div id="header">
	<a href="home.php"><div id="me"><p>ME!</p></div></a>
	<div id="nav_bar">
    <ul id="nav">
	<li><a href="vhome.php">Home</a></li>
	<li><a href="vgallery.php" class="active">Gallery</a></li>
	<li><a href="vcomments.php">Comments</a></li>
    <li><a href="vfriends.php">Friends</a></li>
	</ul>
    </div>    
    </div>

<body>
</body>
</html>