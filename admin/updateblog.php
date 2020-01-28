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
   
               $id_user = $_REQUEST['id'];
     $getresult=base64_decode($_REQUEST['id']) ;
                $up_id= $getresult;  

             if(isset($_REQUEST['action']) && $_REQUEST['action']=="del1")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos1='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updateblog.php?id=".$id_user);
  } 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del2")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos2='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updateblog.php?id=".$id_user);
  } 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="del3")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos3='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updateblog.php?id=".$id_user);
  }
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del4")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos4='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updateblog.php?id=".$id_user);
  }
  ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<style type="text/css">
	.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}
.venom-quarter {
  position: relative;
}

.image {
  display: block;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(255, 0, 0, 0.34); /* Black see-through */
  color: #f1f1f1; 
  width: 25%;
  transition: .5s ease;
  opacity:0;
  color: black;
  font-weight: bolder;
  font-size: 25px;
  padding: 5px;
  text-align: center;
  height: 40px;
}

.venom-quarter:hover .overlay {
  opacity: 1;}
		</style>
	</head>
	<body  class="bd">
		<div class="view" >
<?php

    if(isset($_REQUEST['post1']))
  {
    //$ied = base64_decode($idcard);
        
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
      $dest = "../post/".$name;   
      move_uploaded_file($_FILES['photos1']['tmp_name'], $dest) ;
       $photo1 =",photos1='$name'";

    }
    if($_FILES['photos2']['name']!="")
    {

      $name1 = $_FILES['photos2']['name'];
      $dest= "../post/".$name1;   
      move_uploaded_file($_FILES['photos2']['tmp_name'], $dest) ;
       $photo2=",photos2='$name1'";

    }
    if($_FILES['photos3']['name']!="")
    {

      $name2 = $_FILES['photos3']['name'];
      $dest = "../post/".$name2;   
      move_uploaded_file($_FILES['photos3']['tmp_name'], $dest) ;
       $photo3=",photos3='$name2'";

    }
    if($_FILES['photos4']['name']!="")
    {

      $name3 = $_FILES['photos4']['name'];
      $dest = "../post/".$name3;   
      move_uploaded_file($_FILES['photos4']['tmp_name'], $dest) ;
       $photo4=",photos4='$name3'";

    }

  echo  $sql = "update user_post set 
    blog_head='$blog_head',blog_dtl='$blog_dtl',blog_body='$blog_body' ".$photo1." ".$photo2." ".$photo3." ".$photo4."  where id='$up_id'";
  mysqli_query($con,$sql);
  header("location:adminbloglist.php");
  
 } 
  ?>
  <?php 
    $sql1="select * from user_post where id=$up_id";
      $req1=mysqli_query($con,$sql1);
      $arr1=mysqli_fetch_assoc($req1) ;
    ?>
              <h3 class="venom-opacity text-muted text-center">Update blog post</h3>
             <?php if(!empty($arr1['photos1'])||!empty($arr1['photos2'])||!empty($arr1['photos3'])||!empty($arr1['photos4'])){?> <h6 style="color: red;">Click on the photo to delete* </h6><?php }?>
  <form action="" method="post" enctype="multipart/form-data" id="update" >
    
            <?php 
            if(!empty($arr1['photos1'])){?>
            <a href="updateblog.php?action=del1&id=<?php echo base64_encode($arr1['id'])?>">
              <abbr title="delete"><img src="../post/<?php echo $arr1['photos1']?>" style="width:200px;height:200px;padding-right: 0px; " class="venom-margin-bottom" alt=""></abbr></a>
            <?php  }?>
            <?php if(!empty($arr1['photos2'])){?>
            <a href="updateblog.php?action=del2&id=<?php echo base64_encode($arr1['id'])?>">
              <abbr title="delete"><img src="../post/<?php echo $arr1['photos2']?>" style="width:200px;height:200px;padding: 0px;" class="venom-margin-bottom" alt=""></abbr></a>
          <?php  }?>
            <?php if(!empty($arr1['photos3'])){?>
        <a href="updateblog.php?action=del3&id=<?php echo base64_encode($arr1['id'])?>">
              <abbr title="delete"><img src="../post/<?php echo $arr1['photos3']?>" style="width:200px;height:200px;" class="venom-margin-bottom" alt=""></abbr>
         </a>
          <?php }?>
            <?php if(!empty($arr1['photos4'])){?>
          
              <a href="updateblog.php?action=del4&id=<?php echo base64_encode($arr1['id'])?>"><abbr title="delete"><img src="../post/<?php echo $arr1['photos4']?>" style="width:200px;height:200px;" class="venom-margin-bottom" alt=""></abbr></a>
          <?php }?>
       <hr>
     <h9>Upload Photo:</h9><br> 
     <abbr title="<?php echo $arr1['photos1']?>"><input type="file" class="form-control-row" name="photos1" accept="image/*" style=" max-width: 100%; max-height: 100%;" ></abbr>
     <abbr title="<?php echo $arr1['photos2']?>"><input type="file" class="form-control-row" name="photos2" accept="image/*" style=" max-width: 100%; max-height: 100%;" ></abbr>
     <abbr title="<?php echo $arr1['photos3']?>"><input type="file" class="form-control-row" name="photos3" accept="image/*" style=" max-width: 100%; max-height: 100%;" ></abbr>
     <abbr title="<?php echo $arr1['photos4']?>"><input type="file" class="form-control-row" name="photos4" accept="image/*" style=" max-width: 100%; max-height: 100%; margin-bottom: 1%;" ></abbr><hr>
     Blog Heading:
     <input type="text" name="blog_head" maxlength="255" style=" width: 100%; height:30px;margin: 0px;" placeholder="heading maxlength 255" value="<?php echo $arr1['blog_head']?>"  /><br>
              short Summary :
              <textarea contenteditable="true" name="blog_dtl" class="venom-border venom-padding"  maxlength="500" placeholder="Blog short detail under 500" style=" width: 100%; height:60px;resize: none;"  ><?php echo $arr1['blog_dtl']?>"</textarea><br>

              Blog:  
              <textarea contenteditable="true" name="blog_body" class="venom-border venom-padding" placeholder="Status: Feeling Blue" style=" width: 100%; height:130px;resize: none;"><?php echo $arr1['blog_body']?></textarea>
              <button type="submit" class="venom-button venom-theme" name="post1" style="background-color:#91BFE5FF;"><i class=""></i> &nbsp Update</button> 
            </form>

			
      </div>
</body>
</html>
			