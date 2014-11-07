<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<title>WebIra</title>
</head>
<style type="text/css">
#front
{
	padding:10px;
	border:1px solid #CCCCCC;
	border-radius:3px;
	width:800px;
	top:100px;
	height:100%;
	margin:auto;
	position:relative;
	z-index:10;
	background:rgba(255,255,255,0.9);
	
}
#back
{
	top:0;
	left:0;
	width:100%;
	height:100%;
	background:url(images/txture.jpg) no-repeat;
	background-size:cover;
	z-index:0;
	position:fixed;
}
#header
{
	width:auto;
	height: 250px;
	z-index:999;
}
#logo
{
	margin:auto;
	background:url(images/logo.png) no-repeat;
	background-size:contain;
	width:350px;
	height:236px;
	z-index:999;
}
#msg
{
	font-family:arial,sans-serif;
	color:#222222;
	z-index:999;
}
</style>

<body>
<div id="front">
	<div id="header"> <div id="logo"></div></div>
	<div id="msg"><center><h1>Sorry!! You can't register at this time...!! Contact Admin for registration!</h1></center></div>
</div>
<div id="back"></div>
<?php header("Refresh:3; url=combined.php");?>
</body>
</html>