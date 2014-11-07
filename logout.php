<?php 
session_start();
if(isset($_SESSION['uid']) || isset($_SESSION['done']))
{
	unset($_SESSION['done']);
	unset($_SESSION['uid']);
	header("Location: combined.php");
}
if(isset($_SESSION['admin']))
{
	unset($_SESSION['admin']);
	header("Location: combined.php");
}
else
{
	header("Location: combined.php");
}
?>