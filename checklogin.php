<?php
include "dbcon.php";
  $ErrMsg="";
  session_start();
  if(isset($_SESSION['uid']))
  {
  	header("Location: loginsuccess.php");
  }
  else
  {
if ((!empty($_POST['name']) && $_POST['name'] != "" )&&(!empty($_POST['password']) && $_POST['password'] != "" ))
{		$username = trim($_POST['name']);
		$pass = trim($_POST['password']);
		$password = sha1($pass);
		
		
		$username=preg_replace('/\s+/', '_', $username);//replace space by underscore
		$username=preg_replace('/\@+/', '_', $username);//replace
		$username=preg_replace('/\#+/', '_', $username);//replace
		$username=preg_replace('/\!+/', '_', $username);//replace
		$username=preg_replace('/\.+/', '_', $username);//replace
		
		if (isset($_POST['login'])) { // Form has been submitted.
		if(strtolower($username)=="admin" && $pass=="admin")
		{
			session_start();
			$_SESSION['admin']=1;
			header("location:insert.php");
		}
		else
		{
		$query = mysqli_query($con,"SELECT uid FROM signup WHERE uname = '{$username}' AND passw = '{$password}' LIMIT 1") or die(mysql_error());
		
		$num_rows=$query->num_rows;
		
			if ($num_rows == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($query,MYSQLI_ASSOC);
				session_start();
			 $_SESSION['uid']=$found_user['uid'];
			 $_SESSION['n_cmnt']=0;
				header("Location: loginsuccess.php ");
			} else {
				// username/password combo was not found in the database
				$ErrMsg = "Username/password combination incorrect.!!!<br/>";
			}
		}
				
		}
	}
}
mysqli_close($con);			
?>
