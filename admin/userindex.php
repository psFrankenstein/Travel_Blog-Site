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
$idd = $_REQUEST['id'];
$id = base64_decode($idd);
$sql = "select * from page_body where id = '$id'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);
?>
<?php
	
			if(isset($_REQUEST['save']))
			{
				require("connection.php");
				$head_cont= $_REQUEST['head_cont'];
				$content = $_REQUEST['content'];
				$id = $_REQUEST['id'];
                                                                       //echo "<pre/>";
	                                                                       //print_r($_FILES); exit;
	if($_FILES['photo']['name']!="")
	{
	$photo_name= time().$_FILES['photo']['name'];
	$tmp= $_FILES['photo']['tmp_name'];
	$des= "userpage/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	 $old_img = "userpage/".$_REQUEST['old_image'];
	unlink($old_img);
	
	if(move_uploaded_file($tmp,$dest))
	{
	
	 $sql = "update page_body set head_cont='$head_cont',content='$content',photos='$dest' where id = '$id'";
	mysqli_query($con,$sql);
	
	header("location:slider-update.php");
	}
	else
	{
	echo "Error!!";
	
	}
	}
	else
	{
	
	 $sql = "update page_body set head_cont='$head_cont',content='$content' where id = '$id'";
	mysqli_query($con,$sql);
	header("location:slider-update.php");
	
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
				        <h3><a href="slider-update.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Update User Index Page</h3>
				   <div class="table-row">
					         <table  cellspacing="0" cellpadding="0"  border="2px solid black">
						                <form role="form" action="" method="post" enctype="multipart/form-data">
							
							<input type="hidden" name="id" value="<?php echo $arr['id']?>" />
							                  <div class="form-tab">
								                    <label>Head Content</label>
								<textarea  class="form-control-row" name="head_cont" placeholder="Enter head content" value=""><?php echo $arr['head_cont']?></textarea>
							                  </div>
							  
							  <div class="form-tab">
								                    <label>Body Content</label>
								<textarea class="form-control-row1" type="text" name="content" placeholder="Enter content" cols="45" rows="18" aria-required="true"><?php echo $arr['content']?></textarea>
							                  </div>
							  
							  <div class="form-tab">
								  <label class="exis-lev">Existing Image</label>
								<img src="<?php echo $arr['photos']?>" />
								<input type="hidden" value="<?php echo $arr['photos']?>" name="old_image"/>
							   </div>
							  
							  <div class="form-tab">
								                   <label>Content Photo</label>
								                    <input type="file" class="form-control-row" name="photo" accept="image/*">
							                  </div>
							                                        <br>
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