<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="pstyle.css">
<title>Friends</title>
</head>
<?php
include "home_vars.php";
?>
<script type="text/javascript">
function visit(val)
{
	var obj=document.getElementById('visit');
	obj.value=val;
	window.location.href=("setter.php?val="+val);
}
</script>
<style>
	#strip
	{
		background:<?php echo $fcolor['color']?>;
	}
	#nav li a:hover
	{
		background:<?php echo $fcolor['color'];?>;
		color:<?php echo $tcolor;?>;
	}
	#nav li .active
	{
		background:<?php echo $fcolor['color']?>;
		color:<?php echo $tcolor;?>;
		
	}
</style>
<body>
	<div id="header">    
    <div id="nav_bar">
    <ul id="nav">
	<li><a href="home.php" class="acitve">Home</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="comments.php">Comments</a></li>
    <li><a href="friends.php" class="active">Friends</a></li>
	<li><a href="Logout.php">Logout</a></li>
	</ul>
    </div>
    </div>
     <div id="fcontainer">
     <div id="strip"><input type="hidden" id="visit" name="visit" value=""/></div>
     <center><p id="title">People in your friends list!</p>
     <div class="flist">
   	 <?php 
		$content=mysqli_query($con,"SELECT * FROM comments WHERE who=$uid");
		while($rows=mysqli_fetch_row($content))
		{
			$query=mysqli_fetch_array(mysqli_query($con,"SELECT uname, gid FROM signup WHERE uid=$rows[1]"),MYSQLI_ASSOC);
			$query['uname']=strtoupper($query['uname']);
			$query1=mysqli_query($con,"SELECT dp FROM details WHERE uid=$rows[1]");
			$image=mysqli_fetch_array($query1,MYSQLI_ASSOC);
			if($image['dp']==NULL)
			{
				if($query['gid']==1)
					$image['dp']="images/male_profile.PNG";
				elseif($query['gid']==2)
					$image['dp']="images/female_profile.PNG";
			}
			echo "<div class='frnd' onClick='visit($rows[1])'><div id='fimg' style='background:url($image[dp]); background-size:cover;'></div>
    		<div id='fdetails'>
    			<div class='fname'>$query[uname]</div>
  	 		</div></div>";
		}
		?>
        </div></center>
        </div>
</body>
</html>