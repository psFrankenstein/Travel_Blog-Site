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

	
?>
<?php
  //$iid=$_SESSION['id']['id'];
  $ip=$_SERVER['REMOTE_ADDR'];
  if(isset($_REQUEST['post']))
  {
        
    $blog_head= $_REQUEST['blog_head'];
    $blog_dtl= $_REQUEST['blog_dtl'];
    $blog_body= $_REQUEST['blog_body'];


    $photo1="";
    $photo2="";
    $photo3="";
    $photo4="";

    if($_FILES['photos1']['name']!="")
    {

      $name = $_FILES['photos1']['name'];
      $tmp= $_FILES['photos1']['tmp_name']; 
      $dest='post/'.basename($name);  
      move_uploaded_file($tmp, "../post/".basename($name)) ;
       $photo1=$name;

    }
    if($_FILES['photos2']['name']!="")
    {

      $name = $_FILES['photos2']['name'];
      $tmp= $_FILES['photos2']['tmp_name'];   
      $dest='post/'.basename($name);
      move_uploaded_file($tmp, "../post/".basename($name)) ;
       $photo2=$name;

    }
    if($_FILES['photos3']['name']!="")
    {

      $name = $_FILES['photos3']['name'];
      $tmp= $_FILES['photos3']['tmp_name'];
      $dest='post/'.basename($name);  
      move_uploaded_file($tmp, "../upload/".basename($name)) ;
       $photo3=$name;

    }
    if($_FILES['photos4']['name']!="")
    {

      $name = $_FILES['photos4']['name'];
      $tmp= $_FILES['photos4']['tmp_name'];
      $dest='post/'.basename($name);  
      move_uploaded_file($tmp, "../post/".basename($name)) ;
       $photo4=$name;

    }

    $sqlda = "insert into user_post(photos1,photos2,photos3,photos4,blog_head,blog_dtl,blog_body,blog_id,ip) values('$photo1','$photo2','$photo3','$photo4','$blog_head','$blog_dtl','$blog_body','11','$ip')";
  mysqli_query($con,$sqlda);
 // header("location:adminblog.php");
  
}
  
  ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<style type="text/css">
	
		</style>
	</head>
	<body  class="bd">
		<div class="view" >
			
     <h3 class="venom-opacity">write a blog post</h3>
  <form action="" method="post" enctype="multipart/form-data" >
     <h9>Upload Photo:</h9><br>
     <input type="file" class="form-control-row" name="photos1" accept="image/*" style=" max-width: 100%; max-height: 100%;">
     <input type="file" class="form-control-row" name="photos2" accept="image/*" style=" max-width: 100%; max-height: 100%;" >
     <input type="file" class="form-control-row" name="photos3" accept="image/*" style=" max-width: 100%; max-height: 100%;" >
     <input type="file" class="form-control-row" name="photos4" accept="image/*" style=" max-width: 100%; max-height: 100%; margin-bottom: 2%;" ><br><br>
     Blog Heading:
     <label style="margin-left: 15px;"><input type="text" name="blog_head" maxlength="255" style=" width: 80%; height:30px;" placeholder="heading maxlength 255" required /><label style="margin-right: px;"><br><br>
            <label style="">  Short Summary :</label>
              <textarea contenteditable="true" name="blog_dtl" class="venom-border venom-padding"  maxlength="500" placeholder="Blog short detail under 500" style=" width: 80%; height:70px;resize: none;" required></textarea><br><br>

              Blog:
              <label style="margin-left: 85px;"><textarea contenteditable="true" name="blog_body" class="venom-border venom-padding" placeholder="Status: Write a blog"  style=" width: 80%; height:130px;resize: none;" required></textarea></label><br><br>
              <button type="submit" class="venom-button venom-theme" name="post" style="background-color:#91BFE5FF;"><i class=""></i> &nbsp;Post</button> 
            </form>

			</div>
</body>
</html>
			