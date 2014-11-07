<?php 
include "dbcon.php";
session_start();
if(isset($_SESSION['visit']))
	unset($_SESSION['visit']);
$_SESSION['done']=1;
if(!isset($_SESSION['uid']))
{
header("location:combined.php");
}
$uname="";
$uid=$_SESSION['uid'];
$name_quer=mysqli_query($con,"SELECT uname FROM  signup where uid=$uid LIMIT 1");
$row=mysqli_fetch_array($name_quer,MYSQLI_ASSOC);
$uname=strtoupper($row['uname']);
$ret=mysqli_query($con,"SELECT dp FROM details WHERE uid=$uid");
$pic=mysqli_fetch_array($ret,MYSQLI_ASSOC);
$fcolor=mysqli_fetch_array(mysqli_query($con,"SELECT color FROM details WHERE uid=$uid"),MYSQLI_ASSOC);
if($fcolor['color']=='#222222')
	$tcolor='#FFFFFF';
else
	$tcolor='#000000';
?>