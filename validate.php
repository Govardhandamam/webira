<?php
include "dbcon.php";
$nameErr = $emailErr = $dobErr = $genderErr = $telerr = $success = $passerr = "";
if (isset($_POST['signup']))
{
	if ($_SERVER["REQUEST_METHOD"] == "POST" &&(empty($_POST["gender"])||empty($_POST["byear"])||empty($_POST["bmonth"])||empty($_POST["bday"])))
	{
	if(empty($_POST["byear"])||empty($_POST["bmonth"])||empty($_POST["bday"]))
	 {
		 $dobErr = "No DOB???";}
	}
	else
	{
		$uname=strtoupper(test_input($_POST["uname"]));
		/*if((mysqli_query($con,"SELECT uname FROM usrallow WHERE uname = '{$uname}' LIMIT 1")->num_rows)<=0)
		{
			header("Location:nouser.php");
		}*/
		//else
		//{
		$password=pass_filter($_POST["password"]);
		$gender=$_POST["gender"];
		$dob=$_POST["byear"]."".$_POST["bmonth"]."".$_POST["bday"];
		$email=$_POST["email"];
		$mob=$_POST["tel"];
		
		if((mysqli_query($con,"SELECT uname FROM signup WHERE uname = '{$uname}' LIMIT 1")->num_rows)<=0)
		{
			$quer="INSERT INTO signup(uname,passw,gid,email,phone,dob)VALUES('$uname','$password',$gender,'$email',$mob,'$dob')";
			if (!mysqli_query($con,$quer))
			{
				die('Error: ' . mysqli_error($con));
			}
			else
				$success=TRUE;
			if($success)
			{
				session_start();
				$_SESSION['name']=$uname;
				header("Location:success.php");
			}
		}
		else
		{
			$nameErr="Username already registered!!";
		}
		//}
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
mysqli_close($con);
?>