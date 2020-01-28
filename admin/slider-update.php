<?php
require('core.php');
	require("connection.php");
require("slice/header.php");
require("slice/sidebar.php");
require('slice/footer.php');
	if(!isset($_SESSION['id']))
{
	header("location:index.php");
	
}
//$idd = $_REQUEST['id'];
//$id = base64_decode($idd);
$sql = "select * from page_body";
$res = mysqli_query($con,$sql);?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body  class="bd">
		<div class="view">
			<h3><a href="frontend-update.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*User Home Page Content</h3>
			<!-- admin table view  start here -->
			<table class="view-user" cellspacing="0" cellpadding="0"  >
				<div class="total-view">
					<tr align="center"><div class="adm-table">
						<th> <div class="adm-table">AdminID No.</div></th>
						<th colspan="1"><div class="adm-table">Header name</div></th>
						<th colspan="1"><div class="adm-table">Photo</div></th>
						<th colspan="1"><div class="adm-table">Content</div></th>
						<th>update</th>
					</div></tr ></div>
					<!-- table header for admin  end here -->
					<?php while($arr=mysqli_fetch_assoc($res)){?>
					<div class="total-view"><tr>
						<td><div class="usr-table"><?php echo $arr['id']?></div></td>
						<td><div class="usr-table" style="height: auto;" ><?php echo $arr['head_cont']?></div></td>
						<td><div class="usr-table"><?php
										echo "<img src=".$arr['photos'].">";
						?></div>
					</td>
					<td ><div class="usr-table" style="height: auto;"><?php echo strip_tags($arr['content'])?></div></td>
					<td><div class="usr-updel" "><a href="userindex.php?id=<?php echo base64_encode( $arr['id'])?>"><font color=""><button id="butup">Edit</button></font></a></div></td>
				</tr></div>
				<!--admin view container end here -->
				<?php }?>
				
			</table>
		</body>
	</html>