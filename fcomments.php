<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link type="text/css" rel="stylesheet" href="sstyle.css">
<title>Details of friends</title>
</head>
<body>
<div id="header"> <div id="logo"></div>
<a href="logout.php"><div class="logout">Logout</div></a>
</div>
<div id="contents">
<div id="greet">
<center>
<span id="msg">
Fill details about your friends and you are done!
</span>
</center>
</div>

<?php
include "dbcon.php";
session_start();
$uid=$_SESSION['uid'];
require "ins_cmnt.php";
if(!isset($_SESSION['uid']))
{
header("location:combined.php");
}


	$c=0;
	$query=mysqli_query($con,"SELECT whom, comment FROM comments WHERE who=$uid AND comment is NULL");
	if(($query->num_rows)>0)
	{
		$j=0;
		while($temp=mysqli_fetch_row($query))
		{
			$ppl[$j]=$temp[0];
			$cmnt[$j++]=$temp[1];
		}
	}
	$n=count($ppl);
	$_SESSION['num']=$n;
	echo "<div class='u_comments'><form method='POST' id='details' action='".htmlspecialchars($_SERVER['PHP_SELF'])."' name='details' enctype='multipart/form-data'>
	<div id='c_content'>";
  for($i=0;$i<$n;$i++)
  {
	  if($cmnt[$i]==NULL)
	  {
	  $one=mysqli_query($con,"SELECT uname FROM signup WHERE uid=$ppl[$i]");
	  if($one)
	  {
	$one=mysqli_fetch_assoc($one);
	echo "<p id='para".$c."' style='padding:28px;'>
 <span id='name'>".strtoupper($one['uname'])."</span><br>
	 Write a line about <input type='text' name='n_".$c."' value='".strtoupper($one['uname'])."' style='border:none; width:auto; background:white; box-shadow:none; color:#000;' autocomplete='off'><br><textarea rows='4' cols='50' name='c_".$c."' required></textarea>
     <br>
     Things you like about ".strtoupper($one['uname']).":<br><textarea rows='4' cols='50' name='l_".$c."' required></textarea>
     <br>
     Things you hate about ".strtoupper($one['uname']).":<br><textarea rows='4' cols='50' name='h_".$c."' required></textarea>
     <br>
     A pic you like to share with ".strtoupper($one['uname']).":<br>
      <input type='file' name='p_".$c."' id='prof'>
  </p>";
  $c++;
	  }
	  }
  }
  echo "
  </div>
  <center><input type='submit' value='Submit' name='c_submit' id='submit'></center></form></div>";
?>
</div>
</body>
</html>