<?php
require('core.php');
	require("connection.php");
	require('slice/header.php');
	require('slice/sidebar.php');
	require('slice/footer.php');//add the requere page here
	
	if(!isset($_SESSION['id']))
{
	header("location:index.php");
	
}
if($_SESSION['id']['id']!=1)
{
	header("location:index.php");
	
}
?>
<?php
	
	if(isset($_REQUEST['save']))
	{
				
		$firstname= $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		//$admin_id = $_SESSION['admin_info']['id'];
				
                                                      //echo "<pre/>";
	                                                    //print_r($_FILES); exit;
	                         
	   //validetion for usernme
	                    $check_username="select * from admin where username='$username'";
	                 $run_username=mysqli_query($con,$check_username);
	                    $check=mysqli_num_rows($run_username);
	if ($check==1) { ?>
	<script> alert('username alredy exist in database,try another username') ;
	</script>
	<?php }
	                  
	  //validetion for email check requirment and existency
	                     $check_mail="select * from admin where email='$email'";
	                 $run_email=mysqli_query($con,$check_mail);
	                    $check=mysqli_num_rows($run_email);
	if ($check==1) { 
	?>
	<script>alert('This E-mail address is already taken,try another E-mail');
	</script>
	<?php }
	  //validetion for password
	                    
	if (strlen($password)<8) {?>
	<script>alert('Password Should Be Minimum 8 Characters') ;
	</script>
	<?php  }
	/*
	//to creat a seperate folder according to a name and stro  files
	                                             $curdir=getcwd()."/upload";
	                          echo  $patah=mkdir($curdir."/$username");               //"u+rwx,go+rx"   
	                          echo $photo_name=time().$_FILES['photo']['name'];
	                                        $tmp= $_FILES['photo']['tmp_name'];
	                       $dest='getcwd()."/$username"/'.basename($photo_name);
	                               exit;
	                               */
	                  $photo_name= time().$_FILES['photo']['name'];
	$tmp= $_FILES['photo']['tmp_name'];
	$dest= "upload/".basename($photo_name);
	if(move_uploaded_file($tmp,$dest))
	{
	echo $sql = "insert into admin (firstname,lastname,username,email,password,photo) values('$firstname','$lastname','$username','$email','$password','$dest')";
	   //$sql = "insert into admin set firstname='$firstname',lastname='$lastname',username='$username',email='$email',password='$password',photo='$photo_name'";
	mysqli_query($con,$sql);
	
	 header("location:adminview.php");
	}
	else
	{
	?>
	<script>alert('try again with suitable  data');
	</script>
	<?php
	
	}
	}
	
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
			<script>
			function validate(){
			var firstname= document.getElementById("firstname").value;
			var lastname= document.getElementById("lastname").value;
			var username= document.getElementById("username").value;
			
			           var email= document.getElementById("email").value;
			            var reg=/^\w+([\.-]?\w+)*@\gmail([\.-]?\w+)*(\.\w{2,3})+$/;
			var password= document.getElementById("password").value;
			
			
			if(firstname=="")
			{
			alert('please enter name ');
			document.getElementById("firstname").focus();
			return false;
			}
			else if(lastname=="")
			{
			alert('please enter last name ');
			document.getElementById("lastname").focus();
			return false;
			}
			else if(username=="")
			            {
			             alert('please enter username');
			             document.getElementById("username").focus();
			             return false;
			             }
			    if(email=="")
			            {
			             alert('please enter email bro');
			             document.getElementById("email").focus();
			             return false;
			             }
			                                                 
			             else if(reg.test(email)== false)
			            {
			             alert('please enter valid email bro');
			             document.getElementById("email").focus();
			             return false;
			             }
			
			else if(password=="")
			{
			alert('please enter password bro');
			document.getElementById("password").focus();
			return false;
			}
			
			}
			
			 
			</script>
		</head>
		<body class="bd">
			
			
			
			        <div class="row">
				        <h3><a href="index.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Add Admin</h3>
				      <div class="form-group">
					                <form role="form" action="" method="post" enctype="multipart/form-data" onSubmit="return(validate())">
						                  <div class="form-group">
							                    <label>First Name</label>
							                    <input class="form-control" name="firstname" placeholder="Enter your name" value="" id="firstname">
							                    
						                  </div>
						  
						  <div class="form-group">
							                    <label>Last Name</label>
							                    <input class="form-control" name="lastname" placeholder="Enter your lastname" value="" id="lastname">
							                    
						                  </div>
						  
						  <div class="form-group">
							                    <label>Username</label>
							                    <input class="form-control" name="username" placeholder="Enter your username" value="" id="username">
							                    
						                  </div>
						                  <div class="form-group">
							                    <label>Email  &nbsp&nbsp&nbsp&nbsp&nbsp</label>
							                    <input class="form-control" type="email" name="email" placeholder="Enter your email" value="" id="email"></div>
							                    
							                  
							                  <div class="form-group">
								                    <label>Password</label>
								                    <input class="form-control" id="password" name="password" placeholder="Enter your password" id="password">
								                    
							                  </div>
							 
							  <div class="form-group">
								                    <label>Photo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
								                 
								                   <input type="file" class="form-control" name="photo" accept="image/*" >
								                    
							                  </div><br/>
							                  <br>
							                
							                  <button type="reset" class="btn-btn-default">Reset Button</button>
							                  <button type="submit" name="save" class="btn-btn-default">Submit Button</button>
						                </form>
					                     </div>
					<!-- /.col-lg-6 (nested) -->
					              
					<!-- /.col-lg-6 (nested) -->
				            </div>
				<!-- /.row (nested) -->
				         
			</body>
		</html>