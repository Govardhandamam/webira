<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<title>Profile completion</title>
<link type="text/css" rel="stylesheet" href="sstyle.css">
<?php
include "dbcon.php";
session_start();
if(!isset($_SESSION['uid']))
{
header("location:combined.php");
}
$detpic="";
$uname="";
$uid=$_SESSION['uid'];
$query=mysqli_query($con,"SELECT uname FROM details d, signup s where d.uid=$uid AND d.uid=s.uid LIMIT 1");
if(($query->num_rows)>0)
{
	$query=mysqli_query($con,"SELECT comment FROM comments WHERE who=$uid");
	if(($query->num_rows)>0)
	{
		$j=0;
		while($temp=mysqli_fetch_row($query))
		{
			$id[$j++]=$temp[0];
		}
		if(!(in_array(NULL,$id)))
			header("location:home.php");
		else
			header("Location:fcomments.php");
	}
	else
		header("Location:home.php");
}
$name_quer=mysqli_query($con,"SELECT uname, gid FROM  signup where uid=$uid LIMIT 1");
$row=mysqli_fetch_array($name_quer,MYSQLI_ASSOC);
$uname=strtoupper($row['uname']);
$gen=$row['gid'];
if($gen==1)
	$detpic="url(images/edit_male_user.png)";
elseif($gen==2)
	$detpic="url(images/edit_female_user.png)";
?>
<?php require "profile_done.php";?>
<script type="text/javascript">
</script>
</head>
<body>
<div id="header"> <div id="logo"></div>
<a href="logout.php"><div class="logout">Logout</div></a>
</div>
<div id="contents">
<div id="greet">
<center><span id="welcome">Welcome
<span id="user"><?php echo " $uname";?></span></span>
<br><br>
<span id="msg">
You're just a few steps away from completing your profile...!
</span>
</div>
<form method="POST" id="details" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="details" enctype="multipart/form-data">
<div class="u_details">
<center><h1 id="head">Fill in your details</h1></center>
<p>
  <label for="textfield">Full Name: </label>
  <input type="text" name="fname" id="fname" required value=<?php if(!$success){ if(isset($_POST['fname'])) { echo $_POST['fname'];}}?>>
  <div id="det_pic" style="background:<?php echo $detpic;?> no-repeat;background-size:220px 220px;"></div>
  </p>
 <p>
  <label for="textfield">Nickname: </label>
  <input type="text" name="nname" id="nname" required value=<?php if(!$success){ if(isset($_POST['nname'])) { echo $_POST['nname'];}}?>>
  </p>
  <p>
  <label for="textfield">Favourite Color: </label>
 <select id="color" class="fcolor" name="color" required>
    <option selected="1" value="0">
       Color
    </option>
    <option value="#222222">
        Black
    </option>
    <option value="#FFFFFF">
        White
    </option>
    <option value="#EB0509">
        Red
    </option>
    <option value="#0066FF">
        Blue
    </option>
    <option value="#F9E922">
       Yellow
    </option>
    <option value="#00E005">
        Green
    </option>
    <option value="#F94E03">
        Orange
    </option>
    <option value="#FF3493">
        Pink
    </option>
    
    </select>
  </p>
  <p>
  <label for="textfield">Favourite dish: </label>
  <input type="text" name="dish" id="dish" required value=<?php if(!$success){ if(isset($_POST['dish'])) { echo $_POST['dish'];}}?>>
  </p>
  <p>
  <label for="textfield">Favourite drink: </label>
  <input type="text" name="drink" id="drink" required value=<?php if(!$success){ if(isset($_POST['drink'])) { echo $_POST['drink'];}}?>>
  </p>
   <p>
  <label for="textfield">First Crush: </label>
  <input type="text" name="crush" id="crush" required value=<?php if(!$success){ if(isset($_POST['crush'])) { echo $_POST['crush'];}}?>>
  </p>
   <p>
  <label for="textfield">Favourite dress: </label>
  <input type="text" name="dress" id="dress" required value=<?php if(!$success){ if(isset($_POST['dress'])) { echo $_POST['dress'];}}?>>
  </p>
  <p>
  <textarea rows="3"  name="hobby" id="hobby" placeholder="Hobbies" required><?php if(!$success){ if(isset($_POST['hobby'])) { echo $_POST['hobby'];}}?></textarea>
  </p>
  <p>
  <textarea rows="3"  name="smate" id="smate" placeholder="Describe your Soulmate" required><?php if(!$success){ if(isset($_POST['smate'])) { echo $_POST['smate'];}}?></textarea></label>
  </p>
  <p>
  <textarea rows="3" name="wish" id="wish" placeholder="Your biggest wish" required><?php if(!$success){ if(isset($_POST['wish'])) { echo $_POST['wish'];}}?></textarea>
  </p>
  <p>Choose your profile pic<br>
  <label>
  Choose file:
  </label>
  <input type="file" name="profile" id="prof" required> <span class="error"><?php echo $msg;?></span>
  </p>
  </div>
  <hr>
 <div class="u_comments">
  <div id="group"></div>
  <center><h1 id="head">Select people to add to your friends list</h1></center>
<br>

  <div id="ppl">
  <?php 
  $ppl=mysqli_query($con,"SELECT uid, uname FROM signup");
  if($ppl)
  {
	  while($pl=mysqli_fetch_row($ppl))
	  {
		  if($pl[0]==1)
		  {
			  echo "<input type='checkbox' name='ppl[]' value='$pl[0]' id='chk_bx' checked disabled>  ".strtoupper($pl[1])."<br>";
		  }
		  else
		  {
			  echo "<input type='checkbox' name='ppl[]' value='$pl[0]' id='chk_bx'>  ".strtoupper($pl[1])."<br>";
		  }
	  }
  }
  ?>
  </div>
 </div>
 <br>
  <center><input type="submit" value="Submit" id="submit" name="full_submit"></center>
   </form>
   <div id="footer"></div>
</div>
</body>
</html>