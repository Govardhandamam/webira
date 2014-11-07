<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Comments</title>
<link rel="shortcut icon" href="my_icon.ico">
<link type="text/css" rel="stylesheet" href="istyle.css">
</head>
<?php 
$con=mysqli_connect("localhost","root","","frnddb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: ". mysqli_connect_error();
  }
  session_start();
  if(!isset($_SESSION['admin']))
  	header("Location:combined.php");
  $err="";
  function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
  if(isset($_POST['submit']))
  {
	  $name=test_input($_POST['name']);
	  $cmnt=test_input($_POST['cmnt']);
	  $quer="INSERT INTO damam VALUES('$name','$cmnt')";
	  if(!(mysqli_query($con,$quer)))
	  	$err="Failed to insert!!!";
  }
?>
<body>
<a href="logout.php"><div class="logout">Logout</div></a>
<div class="contents">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="comments" id="insert">
<label>Name: <input type="text" name="name" id="name" required></label><br><br>
<label>Comment:<br><textarea name="cmnt" id="cmnt" required></textarea></label>
<br><br>
<input type="submit" name="submit" value="Add" id="submit">
<?php echo $err;?>
</form>
</div>
</body>
</html>