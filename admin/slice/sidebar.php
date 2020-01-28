<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body class="bd">
		<div class="side">
			<?php
			//echo $curdir=getcwd().'/admin';
			//$id=$_SESSION['id']['id']
			$query="select * from admin ";
			$req=mysqli_query($con,$query);
			$arr=mysqli_fetch_assoc($req);
			{ ?>
			<div class="sid">
				<br>
			<abbr title="Admin picture" ><img src="<?php echo $_SESSION['id']['photo']?>" /></abbr></div>
			<div class="sid">
				
			<h3> <?php echo $_SESSION['id']['username'] ."&nbsp &nbsp"; ?></h3></div>
			<?php }?>
			<div><ul class="side-bar">
				<li ><a href="index.php">Admin Dash Board</a> </li>
				<li ><a href="userdash.php">User Dash Board</a> </li>
				<li ><a href="impor.php">Important Notice</a> </li>
				<li ><a href="adminblog.php">Write A Blog</a> </li>
				<li ><a href="trash.php">Trash</a> </li>
			</ul></div>
		</div>
		<!--div for side panal -->
	</body>
</html>