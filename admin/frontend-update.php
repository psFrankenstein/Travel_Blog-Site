<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		
require('slice/header.php');
	require('slice/sidebar.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div class="dashboard-box">
			<abbr title="Update Page Header" ><a href="update-header.php"><div class="add-hdft"><img src="photos/header.png">
			</div></a></abbr>
			<!-- end of Page Header icon in div  -->
			<abbr title="slide menu update" ><a href="slider-update.php"><div class="add-hdft" style="left:30%;"  ><img src="photos/slider.png">
			</div></a></abbr>
			<!-- end of slide menu update icon in div  -->
			<abbr title="user Activity" ><a href="update-footer.php"><div class="add-hdft" style="left:52%;"><img src="photos/footer.png">
			</div></a></abbr>
			
		</div>
		<!-- end of dashboard-box container div  -->
	</body>
</html>
<?php
require('slice/footer.php');
}
else
{
header('location:index.php');
}
?>