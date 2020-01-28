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
$sql = "select * from admin where id = '$id'";
$res = mysqli_query($con,$sql);
$arr = mysqli_fetch_assoc($res);
?>
<?php
	
			if(isset($_REQUEST['save']))
			{
				require("connection.php");
				$firstname= $_REQUEST['firstname'];
				$lastname = $_REQUEST['lastname'];
				$username = $_REQUEST['username'];
				$email = $_REQUEST['email'];
				$password = $_REQUEST['password'];
				//$admin_id = $_SESSION['admin_info']['id'];
				$id = $_REQUEST['id'];
                                                                       //echo "<pre/>";
	                                                                       //print_r($_FILES); exit;
	if($_FILES['photo']['name']!="")
	{
	$photo_name= time().$_FILES['photo']['name'];
	$tmp= $_FILES['photo']['tmp_name'];
	$des= "upload/";
	$dest=$des.basename($photo_name);
	//unlink($dest);
	$old_img = "upload/".$_REQUEST['old_image'];
	unlink($old_img);
	
	if(move_uploaded_file($tmp,$dest))
	{
	
	$sql = "update admin set firstname='$firstname',lastname='$lastname',email='$email',password='$password',photo='$dest' where id = '$id'";
	mysqli_query($con,$sql);
	
	header("location:adminview.php");
	}
	else
	{
	echo "Error!!";
	
	}
	}
	else
	{
	
	 $sql = "update admin set firstname='$firstname',lastname='$lastname',email='$email',password='$password' where id = '$id'";
	mysqli_query($con,$sql);
	header("location:adminview.php");
	
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
				        <h3><a href="adminview.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Update Admin Profile</h3>
				   <div class="table-row">
					         <table  cellspacing="0" cellpadding="0"  border="2px solid black">
						                <form role="form" action="" method="post" enctype="multipart/form-data">
							
							<input type="hidden" name="id" value="<?php echo $arr['id']?>" />
							                  <div class="form-tab">
								                    <label>First Name</label>
								<input class="form-control-row" name="firstname" placeholder="Enter your name" value="<?php echo $arr['firstname']?>">
							                  </div>
							  
							  <div class="form-tab">
								                    <label>Last Name</label>
								<input class="form-control-row" name="lastname" placeholder="Enter your lastname" value="<?php echo $arr['lastname']?>">
							                  </div>
							  
							  <div class="form-tab">
								                    <label>Username&nbsp</label>
								<input class="form-control-row" disabled="disabled" name="username" placeholder="Enter your username" value="<?php echo $arr['username']?>">
							                  </div>
							                  <div class="form-tab">
								                    <label>Email  &nbsp &nbsp &nbsp</label>
								<input class="form-control-row" type="email" name="email" placeholder="Enter your email" value="<?php echo $arr['email']?>">
							                  </div>
							                  <div class="form-tab">
								                    <label>Password</label>
								<input class="form-control-row" name="password" placeholder="Enter your password" value="<?php echo $arr['password']?>">
							                  </div>
							  
							  <div class="form-tab">
								  <label class="exis-lev">Existing Image</label>
								<img src="<?php echo $arr['photo']?>" />
								<input type="hidden" value="<?php echo $arr['photo']?>" name="old_image"/>
							   </div>
							  
							  <div class="form-tab">
								                   <label> Photo&nbsp &nbsp&nbsp &nbsp</label>
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