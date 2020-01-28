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
$sql = "select * from footer where id = '1'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);
?>
<?php
	
			if(isset($_REQUEST['savee']))
			{
				require("connection.php");
				$copyright= $_REQUEST['copyright'];
				$contact_us= $_REQUEST['contact_us'];
				$link1 = $_REQUEST['link1'];
				$link2 = $_REQUEST['link2'];
				$link3 = $_REQUEST['link3'];
				$id = 1;

				
				$photoup1="";
				$photoup2="";
				$photoup3="";


	if($_FILES['photo']['name']!="")
	{
	$photo_name= time().$_FILES['photo']['name'];
	$tmp= $_FILES['photo']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = $_REQUEST['old_image'];
	unlink($old_img);
	move_uploaded_file($tmp,$dest);

	$photoup1 =",share1='$dest'";
    }

    if($_FILES['photo1']['name']!="")
	{
	$photo_name= time().$_FILES['photo1']['name'];
	$tmp= $_FILES['photo1']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = $_REQUEST['old_image'];
	unlink($old_img);
	move_uploaded_file($tmp,$dest);

	$photoup2 =",share2='$dest'";
    }

    if($_FILES['photo2']['name']!="")
	{
	$photo_name= time().$_FILES['photo2']['name'];
	$tmp= $_FILES['photo2']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = $_REQUEST['old_image'];
	unlink($old_img);
	move_uploaded_file($tmp,$dest);

	$photoup3 =",share3='$dest'";
    }

    if($_FILES['photo3']['name']!="")
	{
	$photo_name= time().$_FILES['photo3']['name'];
	$tmp= $_FILES['photo3']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = $_REQUEST['old_image'];
	unlink($old_img);
	move_uploaded_file($tmp,$dest);

	$photoup4 =",cont_logo='$dest'";
    }

	
	 $sql = "update footer set copyright='$copyright',contact_us='$contact_us',link1='$link1',link2='$link2',link3='$link3' ".$photoup1." ".$photoup2." ".$photoup3."".$photoup4." where id ='$id'";
	mysqli_query($con,$sql);

	header('location:update-footer.php');
	
	
	
	
	}
	
	?>
	
	
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
		</head>
		<body>
			
			  <div class="row">
				        <h3><a href="frontend-update.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Update page Footer</h3>
				   <div class="table-row">
					         <table  cellspacing="0" cellpadding="0"  border="2px solid black">
						 <form role="form" action="" method="post" enctype="multipart/form-data">
							
							<input type="hidden" name="id" value="<?php echo $arr['id']?>" />
							                  <div class="form-tab">
								                    <label>Right</label>
								<input class="form-control-row" name="copyright" placeholder="Enter Navigation" value="<?php echo $arr['copyright']?>">
							                  </div>
							  
							<div class="form-tab">
								 <label>cotact link</label>
								<input class="form-control-row" name="contact_us" placeholder="Enter Navigation1" value="<?php echo $arr['contact_us']?>">
							  </div>
							  <div class="form-tab">
								  
								<img src="<?php echo $arr['cont_logo']?>" style="padding:5px;top:15%;width: 100px;height: 100px; left:130%;" />
								<input type="hidden" value="<?php echo $arr['cont_logo']?>" name="old_image"/>
							 </div>
							  
							 <div class="form-tab">
								<label> contact logo</label>
								<input type="file" class="form-control-row" name="photo3" accept="image/*" value="<?php echo $arr['cont_logo']?>">
							 </div>
							                  
							<div class="form-tab">
								  
								<img src="<?php echo $arr['share1']?>" style="padding:5px;top:1%;width: 100px;height: 100px;" />
								<input type="hidden" value="<?php echo $arr['share1']?>" name="old_image"/>
							 </div>
							  
							 <div class="form-tab">
								<label> facebook</label>
								<input type="file" class="form-control-row" name="photo" accept="image/*" value="<?php echo $arr['share1']?>">
							 </div>
							 <div class="form-tab">
								 <label>Facebook link</label>
								<input class="form-control-row" name="link1" placeholder="Enter Navigation1" value="<?php echo $arr['link1']?>">
							  </div>
							 <div class="form-tab">
								  
								<img src="<?php echo $arr['share2']?>" style="padding:5px;margin-top:2%;top:33%;width: 100px; height: 100px" />
								<input type="hidden" value="<?php echo $arr['share2']?>" name="old_image"/>
							 </div>
							  
							 <div class="form-tab">
								<label> twitter</label>
								<input type="file" class="form-control-row" name="photo1" accept="image/*" value="<?php echo $arr['share2']?>">
							 </div>
							 <div class="form-tab">
								 <label>twitter link</label>
								<input class="form-control-row" name="link2" placeholder="Enter Navigation1" value="<?php echo $arr['link2']?>">
							  </div>
							 <div class="form-tab">
								  
								<img src="<?php echo $arr['share3']?>" style="padding:5px;margin-top:2%;top:69%;width: 100px; height: 100px"  />
								<input type="hidden" value="<?php echo $arr['share3']?>" name="old_image"/>
							 </div>
							  
							 <div class="form-tab">
								<label> instagram</label>
								<input type="file" class="form-control-row" name="photo2" accept="image/*" value="<?php echo $arr['share3']?>">
							 </div>
							 <div class="form-tab">
								 <label>instagram link</label>
								<input class="form-control-row" name="link3" placeholder="Enter Navigation1" value="<?php echo $arr['link3']?>">
							  </div>
							 <div class="form-tab">
								 <button type="reset" class="btn-default">Reset Button</button>
								 <button type="submit" name="savee" class="btn-default">Submit Button</button>
							  </div>
						      </form>
					           </table>
				     </div>
				<!--end of main container for update table div-->
			             </div>
			<!--end of main container for update panel-->
		              </body>
	</html>