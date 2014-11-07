<?php 
include "dbcon.php";
session_start();
if(!isset($_SESSION['visit']))
	header("location:home.php");
$_SESSION['done']=1;
if(!isset($_SESSION['uid']))
{
header("location:combined.php");
}

 $usr=mysqli_query($con,"SELECT dp FROM details WHERE uid=$_SESSION[uid]");
$me=mysqli_fetch_array($usr,MYSQLI_ASSOC);

$uname="";
$uid=$_SESSION['visit'];
$name_quer=mysqli_query($con,"SELECT uname, gid FROM  signup where uid=$uid LIMIT 1");
$row=mysqli_fetch_array($name_quer,MYSQLI_ASSOC);
$uname=strtoupper($row['uname']);
if($row['gid']==1)
{
	$u_g="his";
	$f_g="him";
}
elseif($row['gid']==2)
{
	$u_g="her";
	$f_g="her";
}
$ret=mysqli_query($con,"SELECT dp FROM details WHERE uid=$uid");
$pic=mysqli_fetch_array($ret,MYSQLI_ASSOC);
$fcolor=mysqli_fetch_array(mysqli_query($con,"SELECT color FROM details WHERE uid=$uid"),MYSQLI_ASSOC);
if($fcolor['color']=='#222222')
	$tcolor='#FFFFFF';
else
	$tcolor='#000000';
?>