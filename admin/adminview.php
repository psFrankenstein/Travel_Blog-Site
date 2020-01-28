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
	
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
	{
		$idd = $_REQUEST['id'];
		$id = base64_decode($idd);
		
		$sql = "delete from admin where id='$id'";
		mysqli_query($con,$sql);
		
			header("location:adminview.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		
	</head>
	<body  class="bd">
		<div class="view">
			<h3><a href="index.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Admin's Of The Page</h3>
			<!-- admin table view  start here -->
			<table class="view-table" cellspacing="0" cellpadding="0" style="overflow-x:auto;" >
				<div class="total-view">
					<tr ><div class="adm-table">
						<th> <div class="adm-table">AdminID No.</div></th>
						<th><div class="adm-table">Photo</div></th>
						<th><div class="adm-table">First name</div></th>
						<th><div class="adm-table">Last name</div></th>
						<th><div class="adm-table">Username</div></th>
						<th><div class="adm-table">E-mail</div></th>
						<th><div class="adm-table">Password</div></th>
						
						<th>Action</th>
					</div></tr ></div>
					<!-- table header for admin  end here -->
					<?php while($arr=mysqli_fetch_assoc($req)){   
                           $adid=$arr['id'];      
                            $adsiss=$_SESSION['id']['id'];
						?>
					<div class="total-view" ><tr >
						<td><div class="adm-table"><?php echo $arr['id']?></div></td>
						<td ><div class="adm-table"><img src="<?php echo $arr['photo']?>"></div>
					</td>
					<td><div class="adm-table"><?php echo $arr['firstname']?></div></td>
					<td><div class="adm-table"><?php echo $arr['lastname']?></div></td>
					<td><div class="adm-table"><?php if ($adid==$adsiss ||$adsiss==1 ) {
						 echo $arr['username'];} else{ echo '********';}?></div></td>
					<td><div class="adm-table"><?php echo $arr['email']?></div></td>
					<td><div class="adm-table"><?php if ($adid==$adsiss ||$adsiss==1 ) { echo $arr['password'];}else{ echo '********';}?></div></td>
					<td><div class="adm-updel"><?php if ($adid==$adsiss ||$adsiss==1 ) {?>
						<a href="update.php?id=<?php echo base64_encode( $arr['id'])?>"><font color=""><button id="butup">Edit</button></font></a></div> <div class="adm-updel"><a href="adminview.php?action=del&id=<?php echo base64_encode($arr['id'])?>"><font color=""><button>Delete</button></font></a><?php }?></div></td>
				</tr></div>
				<!--admin view container end here -->
				<?php }?>
				
			</table>
			
				</div> <!--div for table -->
				<?php //require ("locview.php"); ?>
			</body>
		</html>