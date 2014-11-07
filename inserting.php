<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="lstyle.css">
<meta charset="utf-8">
<title>Profile completed</title>
</head>
<?php
include "dbcon.php";
session_start();
if(!isset($_SESSION['uid']))
{
header("location:combined.php");
}
if(isset($_SESSION['done']))
	header("location:home.php");
?>
<script type="text/javascript" language="javascript">
function load()
{
	var img=document.getElementById('icon');
	var change=document.getElementById('change');
	var no=document.getElementById('no');
	setTimeout(function(){change.innerHTML="Adding Friends...";},1200);
	setTimeout(function(){change.innerHTML="Adding Comments...";},2200);
	setTimeout(function(){change.innerHTML="Designing your wall...";},3200);
	setTimeout(function(){no.innerHTML="";},4100);
	setTimeout(function(){change.innerHTML="All Done:-)";},4200);
	setTimeout(function(){img.style.backgroundImage="url(images/done.png)";},4200);
	setTimeout(function(){window.location.href="home.php";},7500);
}
</script>
<body onLoad="load()">
<div id="header"> <div id="logo"></div>
<div id="loading">
<center><p id="no">Please wait while your page is getting ready...</p>
<div id="icon"></div>
<p id="change">Creating your profile...</p></center>
</div>
</body>
</html>