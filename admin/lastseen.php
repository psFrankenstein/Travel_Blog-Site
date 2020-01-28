<?php
require('core.php');
require('connection.php');
require('slice/header.php');
require('slice/sidebar.php');
require('slice/footer.php');
if(!isset($_SESSION['id']))
{
header("location:index.php");

}
$query="select * from admin";
$req=mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Activity</title>
		</script>
		
	</head>
	<body  class="bd">
		<div class="view">
			<h3><a href="index.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Admin's Activity</h3>
			<!-- admin table view  start here -->
			<table class="view-table" cellspacing="0" cellpadding="0"  >
				<div class="total-view">
					<tr ><div class="adm-table">
						<th> <div class="adm-table">Username</div></th>
						<th><div class="adm-table">Login Date</div></th>
						<th><div class="adm-table">login Attempt</div></th>
						<th><div class="adm-table">Last Seen</div></th>
						
					</div></tr ></div>
					<!-- table header for admin  end here -->
					<?php while($arr=mysqli_fetch_assoc($req)){?>
					<div class="total-view"><tr >
						<td><div class="adm-table"><?php echo $arr['username']?></div></td>
						<td><div class="adm-table"><?php echo $arr['login_time']?></div></td>
						<td><div class="adm-table"><?php echo $arr['activ_time']?>     time</div></td>
						<td><div class="adm-table"><?php echo $arr['last_seen']?></div></td>
					</tr></div>
					<!--admin view container end here -->
					<?php }?>
					</div> <!--div for table -->
				</body>
			</html>