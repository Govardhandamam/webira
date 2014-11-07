<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="pstyle.css">
<title>Comments</title>
</head>
<?php
include "home_vars.php";
?>
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
	#col
	{
		display:inline-block;
		width:30px;
		height:30px;
		box-shadow:2px 2px 10px #444444;
		background:<?php echo $fcolor['color']?>;
	}
</style>
<body>
	<div id="header">    
    <div id="nav_bar">
    <ul id="nav">
	<li><a href="home.php">Home</a></li>
	<li><a href="gallery.php">Gallery</a></li>
	<li><a href="comments.php" class="active">Comments</a></li>
    <li><a href="friends.php">Friends</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
    </div>
    </div>
    <div id="about"><div id="strip"></div>
    <center><p id="title">About <?php echo $uname;?></p></center>
    <div id="a_cntnt">
	<center>
    <?php 
	$about=mysqli_query($con,"SELECT * FROM details WHERE uid=$uid");
	$abt=mysqli_fetch_array($about,MYSQLI_ASSOC);
	echo "<p>FullName: $abt[fname]</p>
	<p>Nickname: $abt[nname]</p>Favourite Color:<div id='col'></div><p>Favourite Dish:$abt[dish]</p><p>Favourite Drink:$abt[drink]</p><p>First Crush:$abt[crush]</p><p>Favourite Dress:$abt[dress]</p><p>Hobbies:$abt[hobby]</p><p>Soulmate Description:$abt[smate]</p><p>
	Biggest Wish:$abt[wish]</p>";
	?></center>
    </div>
    </div>
    <div id="c_content">
    <div id="strip"></div>
    <div id="u2f">
   	 <center><p id="title">What you wrote about your friends.</p></center>
     <div id="container">
   	 <?php 
		$content=mysqli_query($con,"SELECT * FROM comments WHERE who=$uid");
		while($rows=mysqli_fetch_row($content))
		{
			if($rows[5]==NULL)
				$rows[5]="No pic shared";
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
			echo "<div id='img' style='background:url($image[dp]); background-size:contain;'></div>
    		<div id='details'>
    			<div class='name'>$query[uname]</div>
                <ul class='u_comments'>
                <li>Comment: $rows[2]</li>
                <li>Like: $rows[3]</li>
                <li>Hate: $rows[4]</li>
                <li>Pic: $rows[5]</li>
                </ul>
  	 		</div>";
			echo "<hr>";
		}
		?>
        </div>
    </div>
    <hr>
    <div id="f2u">
     <center><p id="title">What your friends wrote about you.</p></center>
     <div id="container">
     <?php 
		$content=mysqli_query($con,"SELECT * FROM comments WHERE whom=$uid");
		while($rows=mysqli_fetch_row($content))
		{
			if($rows[5]==NULL)
				$rows[5]="No pic shared";
			$query=mysqli_fetch_array(mysqli_query($con,"SELECT uname, gid FROM signup WHERE uid=$rows[0]"),MYSQLI_ASSOC);
			$query['uname']=strtoupper($query['uname']);
			$query1=mysqli_query($con,"SELECT dp FROM details WHERE uid=$rows[0]");
			$image=mysqli_fetch_array($query1,MYSQLI_ASSOC);
			if($image['dp']==NULL)
			{
				if($query['gid']==1)
					$image['dp']="images/male_profile.PNG";
				elseif($query['gid']==2)
					$image['dp']="images/female_profile.PNG";
			}
			echo "<div id='img' style='background:url($image[dp]); background-size:contain;'></div>
    		<div id='details'>
    			<div class='name'>$query[uname]</div>
                <ul class='u_comments'>
                <li>Comment: $rows[2]</li>
                <li>Like: $rows[3]</li>
                <li>Hate: $rows[4]</li>
                <li>Pic: $rows[5]</li>
                </ul>
  	 		</div>";
			echo "<hr>";
		}
		?>
    </div>
    
    </div>
    </div>
</body>
</html>