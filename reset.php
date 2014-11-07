<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<title>Password Reset</title>
</head>
<link type="text/css" rel="stylesheet" href="rstyle.css"/>
<?php
include "dbcon.php";
  $load="hidden";
  session_start();
  if(!isset($_SESSION['name']))
  	$_SESSION['name']="";
  if(!isset($ErrMsg))
  {
	$mar=35;
	$content="visible";
  $reset="visible";
  $change="hidden";
  }
  $success="";
  $ErrMsg="";
  $uname="";
  $pass="";
  if(isset($_POST['reset']))
  {
	  $email=test_input($_POST['email']);
	  $tel=test_input($_POST['tel']);
	  $quer="SELECT uname FROM signup WHERE email='$email' AND phone=$tel LIMIT 1";
	  $msqlqer=mysqli_query($con,$quer);
	  if(($msqlqer->num_rows)==1)
	  {
		  $row=mysqli_fetch_array($msqlqer, MYSQLI_ASSOC);
		  $uname=$row["uname"];
		  $_SESSION['name']=$uname;
		  $change="visible";
		  $reset="hidden";
	  }
	  else
	  $ErrMsg="Wrong Email and Phone number combination!!!";
  }
   $uname=$_SESSION['name'];
  if(isset($_POST['change']))
  {
	  $pswd1=pass_filter($_POST['password1']);
	  $pswd2=pass_filter($_POST['password2']);
	  if($pswd1==$pswd2)
	  {
	  $pass="UPDATE signup SET passw='$pswd1' WHERE uname='$uname'";
	  if(mysqli_query($con,$pass))
	  {
		  $content="hidden";
		  $change="hidden";
		  $reset="hidden";
		  $load="visible";
		  $success="Password Changed!!!";
		  unset($_SESSION['name']);
		  header("Refresh:3; url=combined.php");
	  }
	  }
	  else
	  {
	  $ErrMsg="Passwords do not match!!";
	  $mar=-13;
	  $reset="hidden";
	  $change="visible";
	  }
  }
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
function pass_filter($data)
{
	$pass = trim($data);
	$password = sha1($pass);
	return $password;
}
?>
<body>
<div id="header"> <div id="logo"></div></div>
<div id="content" style="visibility:<?php echo $content;?>">
<div id="rst_div" style="margin-top:<?php echo $mar?>px;">

<form method="post" style="visibility:<?php echo $reset?>; -moz-transition:visibility 0.4s ease-in-out; -webkit-transition:visibility 0.4s ease-in-out; -o-transition:visibility 0.4s ease-in-out; transition:visibility 0.4s ease-in-out;" id="reset" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="reset">
<p style="font-weight:600;">Please enter the following details to change your password..</p>
<p id="text">
<label>Enter your E-mail Id:</label>
<input type="email" name="email" required>
</p>
<p id="text">
<label>Enter your Phone number:</label>
<input type="tel" name="tel" required>
</p>
<p>
<input type="submit" value="Reset" name="reset" id="submit">
</p>

<p><?php echo $ErrMsg; ?></p>
</form>

<form id="reset" method="post" name="change" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="visibility:<?php echo $change?>; margin-top:-180px; -moz-transition:visibility 0.4s ease-in-out; -webkit-transition:visibility 0.4s ease-in-out; -o-transition:visibility 0.4s ease-in-out; transition:visibility 0.4s ease-in-out;">
<p>
Hello! <span style="font-weight:bold;"><?php echo strtoupper($uname);?></span> change your password..
</p>
<p>
      <label for="password">Enter new Password:</label>
      <input type="password" name="password1" title="Enter new password" required>
    </p>
    <p>
      <label for="password">Retype Password:</label>
      <input type="password" name="password2" title="Retype password" required>
    </p>
    <p>
<input type="submit" value="Change" name="change" id="submit">
</p>
<p><?php echo $ErrMsg; ?></p>
</form>

</div>
</div>
<div id="load" style="visibility:<?php echo $load;?>;">
<center><p style="font-weight:700; color:#060"><?php echo $success;?></p>
<p><img src="images/loading.gif" width="200" height="200" draggable="false"></p>
<p style="font-weight:700; color:#03F;">Please wait while you are redirected to the login page...</p></center>
</div>
</body>
</html>