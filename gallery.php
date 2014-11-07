<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="pstyle.css">
<title>Gallery</title>
</head>
<?php
include "home_vars.php";
?>
<style>
	#strip
	{
		background:<?php echo $fcolor['color']?>;
	}
	#nav li a:hover
	{
		background:<?php echo $fcolor['color'];?>;
		color:<?php echo $tcolor;?>;
	}
	#nav li .active
	{
		background:<?php echo $fcolor['color']?>;
		color:<?php echo $tcolor;?>;
		
	}
</style>
<body>
	<div id="header">    
    <div id="nav_bar">
    <ul id="nav">
	<li><a href="home.php" class="acitve">Home</a></li>
	<li><a href="gallery.php" class="active">Gallery</a></li>
	<li><a href="comments.php">Comments</a></li>
    <li><a href="friends.php">Friends</a></li>
	<li><a href="Logout.php">Logout</a></li>
	</ul>
    </div>
    </div>
    <div id="photos">
    <table  border="2" align="center" cellspacing="5">
  <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr id="pic">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>