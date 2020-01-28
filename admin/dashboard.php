<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div class="dashboard-box">
			<abbr title="Add Admin" ><a href="add.php"><div class="add-user"><img src="photos/addusre1.png">
			</div></a></abbr>
			<!-- end of add user icon in div  -->
			<abbr title="Admin list" ><a href="adminview.php"><div class="admin-view"><img src="photos/adminview.png">
			</div></a></abbr>
			<!-- end of add user icon in div  -->
			<abbr title="Admin Activity" ><a href="lastseen.php"><div class="admin-act"><img src="photos/act.png">
			</div></a></abbr>
			<abbr title=" blog by admin" ><a href="adminbloglist.php"><div class="admin-act" style="left:75%; background-color: #FF5D00C0"><img src="photos/blog1.png" >
			</div></a></abbr>
			<abbr title="update admin profile" ><a href="editofficial.php"><div class="admin-act" style="top:38%;left:8%; background-color: #53FBCA8D"><img src="photos/dd.png" >
			</div></a></abbr>
		</div>
		<!-- end of dashboard-box container div  -->
	</body>
</html>
<?php
}
else
{
header('location:index.php');
}
?>