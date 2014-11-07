<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="my_icon.ico">
<link rel="stylesheet" type="text/css" href="vstyle.css">
<?php
include "v_vars.php";
?>
<title><?php echo $uname."'s ";?>comments</title>
</head>
<body>
<style>
	#me
	{
		background:url(<?php echo $me['dp'];?>)no-repeat center; 
		background-size:contain;
	}
	#strip
	{
		background:<?php echo $fcolor['color']?>;
	}
	#nav li a:hover
	{
		background:<?php echo $fcolor['color'];?>;
		color:<?php echo $tcolor;?>;
	}
	#nav .active
	{
		background:<?php echo $fcolor['color']?>;
		color:<?php echo $tcolor;?>;	
	}
</style>
<div id="header">
	<a href="home.php"><div id="me"><p>ME!</p></div></a>
	<div id="nav_bar">
    <ul id="nav">
	<li><a href="vhome.php">Home</a></li>
	<li><a href="vgallery.php">Gallery</a></li>
	<li><a href="vcomments.php" class="active">Comments</a></li>
    <li><a href="vfriends.php">Friends</a></li>
	</ul>
    </div>    
    </div>
    <div id="c_content">
    <div id="strip"></div>
    <div id="u2f">
   	 <center><p id="title">What <?php echo $uname;?> wrote about <?php echo $u_g;?> friends.</p></center>
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
     <center><p id="title">What <?php echo $uname."'s"?> friends wrote about <?php echo $f_g;?>.</p></center>
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