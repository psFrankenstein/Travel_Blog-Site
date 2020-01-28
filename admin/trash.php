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
			<abbr title="User Trash" ><a href="usertrash.php"><div class="add-hdft"><img src="photos/663921-200.png">
			</div></a></abbr>
			<!-- end of add user icon in div  -->
			<abbr title="Blog Trash" ><a href="blogtrash.php"><div class="add-hdft" style="left:30%;"><img src="photos/Places-trash-full-icon.png">
			</div></a></abbr>

			<abbr title="Contact Completed" ><a href="conttrash.php"><div class="add-hdft" style="left:55%;"><img src="photos/contact.png">
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