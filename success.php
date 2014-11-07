<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Successfull</title>
</head>
<link rel="shortcut icon" href="my_icon.ico">
<?php 
session_start();
if(!isset($_SESSION['name']))
	header("location:combined.php");
?>
<style type="text/css">
body 
{
	background:url(images/Big_log11.png) repeat;
}
#header
{
	//background:#f0f0f0;
	width:auto;
	height: 152px;
}
#logo
{
	margin:auto;
	background:url(images/logo.png) no-repeat;
	background-size:contain;
	//background-color:#f0f0f0;
	width:220px;
	height:149px;
}

#success
{
	font-family:arial,sans-serif;
	width:800px;
	margin:30px auto;
	height:auto;
	padding:30px;
	background-color:rgba(255,255,255,.7);
	box-shadow:2px 3px 15px black;
}
#msg
{
	font-family:arial,sans-serif;
	color:#222222;
	z-index:999;
}
h1 span
{
	color:#0099FF;
}
</style>
<body>
<div id="header"> <div id="logo"></div></div>
<div id="success">
<div id="msg"><center><h1>Welcome <span><?php echo $_SESSION['name']; unset($_SESSION['name']);
header("Refresh:4; url=combined.php");?></span> you are successfully registered!!!</h1></center></div>
</div>
</body>
</html>