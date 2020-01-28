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
$blog_id = $_REQUEST['id'];
  $blog_idget = $_REQUEST['id'];
$idd = $_REQUEST['id'];
    $id = base64_decode($idd);
    $getresdeta="select * from  user_post where id='$id'";
  $reqdata=mysqli_query($con, $getresdeta);
  $ardata=mysqli_num_rows($reqdata);
  if ($ardata==1) {
	 $query="select * from  user_post where id='$id'";
	$req=mysqli_query($con,$query); 

$sql1="select * from user_post where id=$id";
  $req1=mysqli_query($con,$sql1);
  $arr1=mysqli_fetch_assoc($req1);
  $blog_id=$arr1['blog_id'];
  $usee=$arr1['blog_id'];
} 
  else{
  $query="select * from  del_blog where id='$id'";
  $req=mysqli_query($con,$query); 

$sql1="select * from del_blog where id=$id";
  $req1=mysqli_query($con,$sql1);
  $arr1=mysqli_fetch_assoc($req1);
  $blog_id=$arr1['blog_id'];
  $usee=$arr1['blog_id'];
}

  
  //fetch login info
  $sql2="select * from user_login where id=$blog_id";
  $req2=mysqli_query($con,$sql2);
  $arr2=mysqli_fetch_assoc($req2);
    $pid=$arr2['id'];

    $sqlresultre="select * from report where post_id='$id'";
                  $quryresultre=mysqli_query($con,$sqlresultre);
                  $rowresultre=mysqli_num_rows($quryresultre);
    $querseen2="select * from view where post_id= '$id' AND user_id!='NULL'";
        $reqseen2=mysqli_query($con,$querseen2);
        $arrseen2=mysqli_num_rows($reqseen2);
        $querseen3="select * from view where post_id= '$id' AND user_id='NULL'";
        $reqseen3=mysqli_query($con,$querseen3);
        $arrseen3=mysqli_num_rows($reqseen3);
	//=============================================================================

               $id_user = $_REQUEST['id'];
     $getresult=base64_decode($_REQUEST['id']) ;
                $up_id= $getresult;  

             if(isset($_REQUEST['action']) && $_REQUEST['action']=="del1")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos1='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:userblogview.php?id=".$id_user);
  } 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del2")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos2='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:userblogview.php?id=".$id_user);
  } 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="del3")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos3='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:userblogview.php?id=".$id_user);
  }
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del4")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos4='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:userblogview.php?id=".$id_user);
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<style type="text/css">
	.delpo{ margin-right: 5%;margin-left: 10%;text-align: center;}
	.delpo a {color: red;}
		</style>

	</head>
	<body  class="bd">
		<div class="view" >
			<h3><a href="userblog.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a> Blog View</h3>
      <div class="col-lg-8">
        <!-- Title -->
        <h1 class="mt-4"><?php echo $arr1['blog_head']?></h1>
        <!-- Author -->
        <p class="lead">
          by
          <a href=" userview.php?iv=<?php echo $arr2['username']?>"><?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?></a>
        </p>
        <hr>
        <!-- Date/Time -->
        <h6 style="padding-left: 60%;">Posted on <?php echo $arr1['time']?></h6>
        <hr>
        <!-- Preview Image -->
        <?php if(!empty($arr1['photos1'])){?>
        <a href="../post/<?php echo $arr1['photos1']?>" target="_blank"><img class="img-fluid rounded" src="../post/<?php echo $arr1['photos1']?>" alt=""  style="cursor: pointer;height: 200px;width: 200px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos2'])){?>
        <a href="../post/<?php echo $arr1['photos2']?>" target="_blank"><img class="img-fluid rounded" src="../post/<?php echo $arr1['photos2']?>" alt="" style="cursor: pointer;height: 200px;width: 200px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos3'])){?>
        <a href="../post/<?php echo $arr1['photos3']?>" target="_blank"><img class="img-fluid rounded" src="../post/<?php echo $arr1['photos3']?>" alt="" style="cursor: pointer;height: 200px;width: 200px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos4'])){?>
        <a href="../post/<?php echo $arr1['photos4']?>" target="_blank"><img class="img-fluid rounded" src="../post/<?php echo $arr1['photos4']?>" alt="" style="cursor: pointer;height: 200px;width: 200px;"></a>
        <?php }?>
        <!--set delete option-->
        <div>
        	<span class="delpo">
        <?php 
            if(!empty($arr1['photos1'])){?>
            <a href="userblogview.php?action=del1&id=<?php echo base64_encode($arr1['id'])?>">Delete</a>
            <?php  }?></span>
            <span class="delpo">
            <?php if(!empty($arr1['photos2'])){?>
            <a href="userblogview.php?action=del2&id=<?php echo base64_encode($arr1['id'])?>">Delete</a>
          <?php  }?></span>
          <span class="delpo">
            <?php if(!empty($arr1['photos3'])){?>
        <a href="userblogview.php?action=del3&id=<?php echo base64_encode($arr1['id'])?>">Delete</a>
          <?php }?></span>
          <span class="delpo">
            <?php if(!empty($arr1['photos4'])){?>
          
              <a href="userblogview.php?action=del4&id=<?php echo base64_encode($arr1['id'])?>">Delete</a>
          <?php }?></span>
      </div>
        
        <hr>
        <!-- Post Content -->
        <p><?php echo $arr1['blog_body']?></p>
        <hr style="padding: 0px;margin: 1px;">
        <p>
        <img src="../photos/liked.png" style="height: 22px;padding-bottom: 3px;">like
               
          </span><?php 
             $sqllike1 = "select id from likes where  post_id='$id' "; //get like data from database

                 $reslike1 = mysqli_query($con,$sqllike1); //run query

                  $rowlike1 = mysqli_num_rows($reslike1); //fatch row
          echo $rowlike1;

            $sql32="select * from comments where blog_id=$id";
  $req32=mysqli_query($con,$sql32);
  //$arr32=mysqli_fetch_assoc($req32);
     $row32 = mysqli_num_rows($req32)?><!--form to creat like unlike formet--></p>
<p><img class="rounded-circle" src="../photos/seen.png" alt="" style="height: 15px;width:auto;"> <?php echo $arrseen2;?></p>
           <p><img class="rounded-circle" src="../photos/an.png" alt="" style="height: 20px;width:auto;"> <?php echo $arrseen3;?></p> <!--form to see post is seen by people-->
           <p><img class="rounded-circle" src="../photos/comment.png" alt="" style="height: 20px;width:auto;"><?php echo $row32;?></p>
           <p><img src="../photos/repo.png" style="height: 9px;padding-bottom: 3px;">Report Abuse
               <?php 
               $sqlresult="select * from report where post_id='$id'";
                  $quryresult=mysqli_query($con,$sqlresult);
                  $rowresult=mysqli_num_rows($quryresult);
                 echo $rowresult;
               ?></p>
<hr style="padding: 0px;margin: 1px;">

               <?php  $sql0="select * from comments where blog_id=$id";
        $req0=mysqli_query($con,$sql0);
        while( $arr0=mysqli_fetch_assoc($req0)){ 
        $delid=$arr0['id'];
        $comuser=$arr0['u_id'];?>
        <div class="media mb-3" id="comment" style="background-color: #0600FF10">
          <img class="d-flex mr-3 rounded-circle" src="<?php echo $arr0['logo']?>" alt="" style="width:50px;height: 50px;" >
          <div class="media-body">
            <h6 class="mt-0" style="margin: 0px;padding: 0px;"><?php echo $arr0['comenter']?> &nbsp 

              <div class="text-right lead text-muted" style="margin: 0px;padding: 0px;font-size: 10px;"><?php echo date("y-m-d~H:i:s",$arr0['time'])?></div></h6>
            <h8 style="margin: 0px;padding: 0px;padding-bottom: 2px;"><?php echo $arr0['comments']?></h8>
          </div>
        </div>
        <?php }?>
      </div>


			</div>
</body>
</html>
			