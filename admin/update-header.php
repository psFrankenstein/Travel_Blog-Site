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
$sql = "select * from frontend_header where id = '1'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);
?>
<?php
	
			if(isset($_REQUEST['save']))
			{
				require("connection.php");
				$Navigation= $_REQUEST['Navigation'];
				$Navigation1 = $_REQUEST['Navigation1'];
				$Navigation2 = $_REQUEST['Navigation2'];
				$Navigation3 = $_REQUEST['Navigation3'];
				$Navigation4 = $_REQUEST['Navigation4'];
				$Navigation5 = $_REQUEST['Navigation5'];
				$Navigation6 = $_REQUEST['Navigation6'];
				$Navigation7 = $_REQUEST['Navigation7'];
				//$email = $_REQUEST['email'];
				//$password = $_REQUEST['password'];
				//$admin_id = $_SESSION['admin_info']['id'];
				$id = 1;
                                                                       //echo "<pre/>";
	                                                                       //print_r($_FILES); exit;
	if($_FILES['photo']['name']!="")
	{
	$photo_name= time().$_FILES['photo']['name'];
	$tmp= $_FILES['photo']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = "$des".$_REQUEST['old_image'];
	unlink($old_img);
	
	if(move_uploaded_file($tmp,$dest))
	{
	
	 echo $sql = "update frontend_header set Navigation='$Navigation',Navigation1='$Navigation1',Navigation2='$Navigation2',Navigation3='$Navigation3',Navigation4='$Navigation4',logo='$dest' where id ='$id'";
	mysqli_query($con,$sql);
	
	header("location:update-header.php");
	}
	else
	{
	echo "Error!!";
	
	}
	}
	else
	{
	
	 echo $sql = "update frontend_header set Navigation='$Navigation',Navigation1='$Navigation1',Navigation2='$Navigation2',Navigation3='$Navigation3',Navigation4='$Navigation4' where id ='$id'";
	mysqli_query($con,$sql);
	header("location:update-header.php");
	
	}
	
	}
	
	?>
	
	
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
		</head>
		<body>
			
			  <div class="row">
				        <h3><a href="frontend-update.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Update page Header</h3>
				   <div class="table-row">
					         <table  cellspacing="0" cellpadding="0"  border="2px solid black">
						 <form role="form" action="" method="post" enctype="multipart/form-data">
							
							<input type="hidden" name="id" value="<?php echo $arr['id']?>" />
							                  <div class="form-tab">
								                    <label>Navigation &nbsp&nbsp</label>
								<input class="form-control-row" name="Navigation" placeholder="Enter Navigation" value="<?php echo $arr['Navigation']?>">
							                  </div>
							  
							<div class="form-tab">
								 <label>Navigation 1</label>
								<input class="form-control-row" name="Navigation1" placeholder="Enter Navigation1" value="<?php echo $arr['Navigation1']?>">
							  </div>
							 <div class="form-tab">
								<label>Navigation 2</label>
								<input class="form-control-row"  name="Navigation2" placeholder="Enter Navigation2" value="<?php echo $arr['Navigation2']?>">
							 </div>
							 <div class="form-tab">
								<label>Navigation 3</label>
								<input class="form-control-row"  name="Navigation3" placeholder="Enter Navigation3" value="<?php echo $arr['Navigation3']?>">
							 </div>
							 <div class="form-tab">
								<label>Navigation 4</label>
								<input class="form-control-row"  name="Navigation4" placeholder="Enter Navigation4" value="<?php echo $arr['Navigation4']?>">
							 </div>
							 <div class="form-tab">
								<label>Navigation 5</label>
								<input class="form-control-row" disabled="disabled" name="Navigation5" placeholder="Enter Navigation5" value="<?php echo $arr['Navigation5']?>">
							 </div>
							 <div class="form-tab">
								<label>Navigation 6</label>
								<input class="form-control-row" disabled="disabled" name="Navigation6" placeholder="Enter Navigation6" value="<?php echo $arr['Navigation6']?>">
							 </div>
							 <div class="form-tab">
								<label>Navigation 7</label>
								<input class="form-control-row" disabled="disabled" name="Navigation7" placeholder="Enter Navigation7" value="<?php echo $arr['Navigation7']?>">
							 </div>
							                  
							<div class="form-tab">
								  
								<img src="<?php echo $arr['logo']?>" />
								<input type="hidden" value="<?php echo $arr['logo']?>" name="old_image"/>
								<label class="header-lev">Existing logo</label>
							 </div>
							  
							 <div class="form-tab">
								<label> Photo&nbsp &nbsp&nbsp &nbsp</label>
								<input type="file" class="form-control-row" name="photo" accept="image/*">
							 </div>
							 <div class="form-tab">
								 <button type="reset" class="btn-default">Reset Button</button>
								 <button type="submit" name="save" class="btn-default">Submit Button</button>
							  </div>
						      </form>
					           </table>
				     </div>
				<!--end of main container for update table div-->
			             </div>
			<!--end of main container for update panel-->
		              </body>
	</html>