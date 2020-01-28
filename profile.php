<?php 
require('core.php'); //access the current path
require('connection.php'); //create  a connection for data base

if(!isset($_SESSION['id']))
{
  header("location:index.php");
  
}
?>
<!DOCTYPE html>
<!-- travler blog front page -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="css/css" rel="stylesheet">
  <link href="css/css(1)" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/fontpage.css" rel="stylesheet">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
</style>
</head>
<body>
   <!-- Navigation -->
  <?php require('slice/header.php'); 
  $query="select * from user_post";
  $req=mysqli_query($con,$query);
  
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
       //back up for deleted blogs
    $reset="INSERT INTO del_blog SELECT * FROM user_post WHERE id='$ied'";
            mysqli_query($con,$reset);
    
    $sql = "delete from user_post where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:profile.php");
  } ?>
   <!-- Page Container -->
<div class="venom-container venom-content" style="max-width:1400px;margin-top:70px">    
  <!-- The Grid -->
  <div class="venom-row">
    <!-- Left Column -->
    <div class="venom-col m3">
      <!-- Profile -->
      <div class="venom-card venom-round venom-white">
        <div class="venom-container">
          <h4 class="venom-center">My Profile</h4>
         <p class="venom-center"><a href="#" onclick="document.getElementById('id04').style.display='block'"><abbr title="Edit picture" style="cursor: pointer;"><img src="<?php echo $_SESSION['id']['p_photo'] ?>" class="venom-circle" style="height:106px;width:106px" alt="b" /></abbr></a></p>
         <h4 class="venom-center"><?php echo $_SESSION['id']['name'].'&nbsp'; 
         //to set the order of name
         if(strlen($_SESSION['id']['name'])>8)
         {
          echo '<br>';
         }
         else if(strlen($_SESSION['id']['last_name'])>14){
          echo '<br>';}
         echo $_SESSION['id']['last_name']?></h4>
         <hr>
         <!--personal dtls editing here-->
          <label style="padding-left: 45%;font:bold;"><a href="#" onclick="document.getElementById('id03').style.display='block'"> Edit<img src="photos/1edt.png" style="width: 10%; height: 10%; padding-left: 5px;"></a></label>
         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Work" style="cursor: pointer;"><img src="photos/work.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['work'] ?></p>

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Location" style="cursor: pointer;"><img src="photos/home.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['country'] ?></p>

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Location" style="cursor: pointer;"><img src="photos/mail.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['email'] ?></p>

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Gender" style="cursor: pointer;"><img src="photos/gdr.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['gender'] ?></p><!--gender-->

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Birthday" style="cursor: pointer;"><img src="photos/birthday.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['b_date'].'/'.$_SESSION['id']['b_day'].'/'.$_SESSION['id']['b_year'] ?></p>

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Contact" style="cursor: pointer;"><img src="photos/contact.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $_SESSION['id']['contact'] ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="venom-card venom-round">
        <div class="venom-white" >
          <!--==========f0r report view for left side================-->
          <?php  $sessuid=$_SESSION['id']['id'];
                   $timerepo=time();
                   $current_date_repo=date('ymd');
                   //for report count
                 $sqlcount="select * from report where user_id='$sessuid' ";
                  $qurcount=mysqli_query($con,$sqlcount);
                  $rowcount=0;
                  while ($getcount=mysqli_fetch_assoc($qurcount)){
                   $set=date("ymd",$getcount['time']);
                  
                 if($current_date_repo==$set){
                   $rowcount=$rowcount+1;
                } }
                   //for like count
                $sqlcount1="select * from likes where which_blog='$sessuid'";
                  $qurcount1=mysqli_query($con,$sqlcount1);
                  $rowcount1=0;
                 while ( $getcount1=mysqli_fetch_assoc($qurcount1)){
                   $set1=date("ymd",$getcount1['created_time']);
                 if($current_date_repo===$set1){
                    $rowcount1=$rowcount1+1;
                } }

                 //for comment count
                $sqlcount11="select * from comments where which_bloger='$sessuid'";
                  $qurcount11=mysqli_query($con,$sqlcount11);
                  $rowcount11=0;
                 while( $getcount11=mysqli_fetch_assoc($qurcount11)){
                   $set11=date("ymd",$getcount11['time']);
                 if($current_date_repo==$set11){
                    $rowcount11=$rowcount11+1;
                } }
                  ?>
          <button onclick="myFunction(&#39;Demo1&#39;)" class="venom-button venom-block venom-theme-l1 venom-left-align"><i class="fa-fw venom-margin-right"></i><abbr title="Report" style="cursor: pointer;"><img src="photos/edt.png" style="width: 9%; height: 9%; padding-right: 6px;"></abbr>Post Report  <span class="badge" style="background-color:#FF0000B2;margin-left: 5px"><?php echo $rowcount;?></span></button>
          <div id="Demo1" class="venom-hide venom-container" style="margin: 0px;padding:2px; height: 300px;display:block;overflow: auto;"><hr style="background-color:#8A000B86;padding: 0px;margin: 0px;height: 1px;margin-bottom: 1px;">
            <?php 
                   //$sessuid=$_SESSION['id']['id'];
                  $sqlresultre="select * from report where user_id='$sessuid' ORDER BY id DESC";
                  $quryresultre=mysqli_query($con,$sqlresultre);
                  $rowresultre=mysqli_num_rows($quryresultre);
                  while ($getres=mysqli_fetch_assoc($quryresultre)) { 
                    $ouser=$getres['who'];
                     $reblo=$getres['post_id'];
                     $readmin=$getres['admin'];
                     //to get user informetion who reported
                     $sqlusere="select * from user_login where id='$ouser'";
                  $quryusere=mysqli_query($con,$sqlusere);
                    $getname=mysqli_fetch_assoc($quryusere);
          //to get blog post photos
                    $sqlblog="select * from user_post where id='$reblo'";
                  $qurblog=mysqli_query($con,$sqlblog);
                    $getblog=mysqli_fetch_assoc($qurblog);
                    ?>
                      
            <p>
               <?php if(!empty($getblog['photos1'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog['photos1']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog['photos2'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog['photos2']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog['photos3'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog['photos3']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog['photos4'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog['photos4']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }?>
              <font style="font-size: 13px;"><?php if($readmin==NULL){?>
                <a href="read.php?id=<?php echo base64_encode($getres['post_id'])?>">your blog Reported by</a>
                 <a href="ucbloger.php?id=<?php echo base64_encode($getname['id'])?>"><font style="color: green;"><?php echo $getname['name'];?></font></a></font><?php }else{?><a href="read.php?id=<?php echo base64_encode($getres['post_id'])?>"><font style="color: red;">your blog Reported by ADMIN</font></a><?php }?> <font style="font-size: 9px;">at <?php echo date("y-m-d - H:i:s",$getres['time']);?></font></p>
            <?php }?>
          </div>
          <!--==========f0r likes left side ================-->
          <button onclick="myFunction(&#39;Demo2&#39;)" class="venom-button venom-block venom-theme-l1 venom-left-align" style="font-size: 15px;"><i class="fa-fw venom-margin-right"></i> <abbr title="Likes" style="cursor: pointer;"><img src="photos/liked.png" style="width: 9%; height: 9%; padding-right: 6px;"></abbr>Like Notification <span class="badge" style="background-color:#FF0000B2;margin-left: 5px;"><?php echo $rowcount1;?></span></button>
          <div id="Demo2" class="venom-hide venom-container" style="margin: 0px;padding:2px; height: 300px;display:block;overflow: auto;"><hr style="background-color:#8A000B86;padding: 0px;margin: 0px;height: 1px;margin-bottom: 1px;">
            <?php 
                   //$sessuid=$_SESSION['id']['id'];
                  $sqlresultre1="select * from likes where which_blog='$sessuid' ORDER BY id DESC";
                  $quryresultre1=mysqli_query($con,$sqlresultre1);
                  $rowresultre1=mysqli_num_rows($quryresultre1);
                  while ($getres1=mysqli_fetch_assoc($quryresultre1)) { 
                    $ouser1=$getres1['user_id'];
                     $reblo1=$getres1['post_id'];
                     $idliked=$getres1['which_blog'];

                     //to get user information who reported
                     $sqlusere1="select * from user_login where id='$ouser1'";
                  $quryusere1=mysqli_query($con,$sqlusere1);
                    $getname1=mysqli_fetch_assoc($quryusere1);
          //to get blog post photos
                    $sqlblog1="select * from user_post where id='$reblo1'";
                  $qurblog1=mysqli_query($con,$sqlblog1);
                    $getblog1=mysqli_fetch_assoc($qurblog1);
                    ?>
                      
            <p>
               <?php if(!empty($getblog1['photos1'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos1']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos2'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos2']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos3'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos3']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog1['photos4'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog1['photos4']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }?>
              <font style="font-size: 13px;">
                <?php if($sessuid==$ouser1){ ?><a href="read.php?id=<?php echo base64_encode($getres1['post_id'])?>">you liked this post</a><?php } else{?>

                 <a href="read.php?id=<?php echo base64_encode($getres1['post_id'])?>">your blog liked by</a>
                 <a href="ucbloger.php?id=<?php echo base64_encode($getname1['id'])?>"><font style="color: green;"><?php echo $getname1['name'];?></font></a><?php }?></font> <font style="font-size: 9px;">at <?php echo date("y-m-d - H:i:s",$getres1['created_time']);?></font></p>
            <?php }?>
          </div>
            <!--==========f0r comments left side================-->
          <button onclick="myFunction(&#39;Demo4&#39;)" class="venom-button venom-block venom-theme-l1 venom-left-align" style="font-size: 15px;"><i class="fa-fw venom-margin-right"></i><abbr title="Comments" style="cursor: pointer;"><img src="photos/comment.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr>Comments  <span class="badge" style="background-color:#FF0000B2;margin-left: 5px;"><?php echo $rowcount11;?></span></button>
          <div id="Demo4" class="venom-hide venom-container" style="margin: 0px;padding:2px; height: 300px;display:block;overflow: auto;"><hr style="background-color:#8A000B86;padding: 0px;margin: 0px;height: 1px;margin-bottom: 1px;">
            <?php 
                   //$sessuid=$_SESSION['id']['id'];

                  $sqlresultre2="select * from comments where which_bloger='$sessuid' ORDER BY id DESC";
                  $quryresultre2=mysqli_query($con,$sqlresultre2);
                  $rowresultre2=mysqli_num_rows($quryresultre2);
                  while ($getres2=mysqli_fetch_assoc($quryresultre2)) { 
                    $ouser2=$getres2['u_id'];
                     $reblo2=$getres2['blog_id'];
                     //$idcoment=$getres2['which_blog'];

                     //to get user information who reported
                     $sqlusere2="select * from user_login where id='$ouser2'";
                  $quryusere2=mysqli_query($con,$sqlusere2);
                    $getname2=mysqli_fetch_assoc($quryusere2);
          //to get blog post photos
                    $sqlblog2="select * from user_post where id='$reblo2'";
                  $qurblog2=mysqli_query($con,$sqlblog2);
                    $getblog2=mysqli_fetch_assoc($qurblog2);
                    ?>
                      
            <p>
               <?php if(!empty($getblog2['photos1'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog2['photos1']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog2['photos2'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog2['photos2']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog2['photos3'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog2['photos3']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($getblog2['photos4'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $getblog2['photos4']?>" alt=""  style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }?>
              <font style="font-size: 13px;">
                <?php if($sessuid==$ouser2){ ?><a href="read.php?id=<?php echo base64_encode($getres2['blog_id'])?>#comment">you comment on this</a><?php } else{  if (!empty($ouser2)) {?>
                 <a href="read.php?id=<?php echo base64_encode($getres2['blog_id'])?>#comment">commented by</a>
                 <a href="ucbloger.php?id=<?php echo base64_encode($getname2['id'])?>"><font style="color: green;"><?php echo $getname2['name'];?></font></a><?php }else{?>
          <a href="read.php?id=<?php echo base64_encode($getres2['blog_id'])?>#comment">commented by Anonymous </a></font></a><?php }}?>

               </font> <font style="font-size: 9px;">at <?php echo date("y-m-d - H:i:s",$getres2['time']);?></font></p>
            <?php }?>

          </div>
          <!--==========f0r photos left side================-->
          <button onclick="myFunction(&#39;Demo3&#39;)" class="venom-button venom-block venom-theme-l1 venom-left-align" style="font-size: 15px;"><i class="fa-fw venom-margin-right"></i> <abbr title="Contact" style="cursor: pointer;"><img src="photos/gallery.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr>Photos</button>
          <div id="Demo3" class="venom-hide venom-container">
         <div class="venom-row-padding">
         <br>
         <a href="profilegallery.php"><p class="text-center">See More..</p></a>
         <?php  
            $idu=$_SESSION['id']['id'];
       $sql1="select * from user_post where blog_id='$idu' ORDER BY id DESC limit 4";
      $req1=mysqli_query($con,$sql1);
      while($arr11=mysqli_fetch_assoc($req1)){ ?>
                 <?php if(!empty($arr11['photos1'])){?>
           <div class="venom-half">
             <img src="post/<?php echo $arr11['photos1']?>" style="width:100px;height: 50px;" class="venom-margin-bottom" alt=''>
           </div>
           <?php }?>
           <?php if(!empty($arr11['photos2'])){?>
           <div class="venom-half">
             <img src="post/<?php echo $arr11['photos2']?>" style="width:100px;height: 50px;" class="venom-margin-bottom" alt=''>
           </div>
           <?php }?>
           <?php if(!empty($arr11['photos3'])){?>
           <div class="venom-half">
             <img src="post/<?php echo $arr11['photos3']?>" style="width:100px;height: 50px;" class="venom-margin-bottom" alt=''>
           </div>
           <?php }?>
           <?php if(!empty($arr11['photos4'])){?>
           <div class="venom-half">
             <img src="post/<?php echo $arr11['photos4']?>" style="width:100px;height: 50px;" class="venom-margin-bottom" alt=''>
           </div>
           <?php }?>
             <?php }?>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Alert Box 
      <div class="venom-container venom-display-container venom-round venom-theme-l4 venom-border venom-theme-border venom-margin-bottom venom-hide-small">
        <span onclick="this.parentElement.style.display=&#39;none&#39;" class="venom-button venom-theme-l3 venom-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>   -->
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <?php
    $ip=$_SERVER['REMOTE_ADDR'];
  $iid=$_SESSION['id']['id'];
  if(isset($_REQUEST['post']))
  {
        
    $blog_head= $_REQUEST['blog_head'];
    $finalblog_head=str_replace('<', ' ',$blog_head);
    $blog_dtl= $_REQUEST['blog_dtl'];
    $finalblog_dtl=str_replace('<', ' ',$blog_dtl);
    $blog_body= $_REQUEST['blog_body'];
    $finalblog_body=str_replace('<', ' ',$blog_body);


    $photo1="";
    $photo2="";
    $photo3="";
    $photo4="";

    if($_FILES['photos1']['name']!="")
    {

      $name = time().$_FILES['photos1']['name'];
      $dest = "post/".$name;   
      move_uploaded_file($_FILES['photos1']['tmp_name'], $dest) ;
       $photo1=$name;

    }
    if($_FILES['photos2']['name']!="")
    {

      $name = time().$_FILES['photos2']['name'];
      $dest = "post/".$name;   
      move_uploaded_file($_FILES['photos2']['tmp_name'], $dest) ;
       $photo2=$name;

    }
    if($_FILES['photos3']['name']!="")
    {

      $name = time().$_FILES['photos3']['name'];
      $dest = "post/".$name;   
      move_uploaded_file($_FILES['photos3']['tmp_name'], $dest) ;
       $photo3=$name;

    }
    if($_FILES['photos4']['name']!="")
    {

      $name = time().$_FILES['photos4']['name'];
      $dest = "post/".$name;   
      move_uploaded_file($_FILES['photos4']['tmp_name'], $dest) ;
       $photo4=$name;

    }

    $sql = "insert into user_post(photos1,photos2,photos3,photos4,blog_head,blog_dtl,blog_body,blog_id,ip) values('$photo1','$photo2','$photo3','$photo4','$finalblog_head','$finalblog_dtl','$finalblog_body','$iid','$ip')";

   // exit;
  mysqli_query($con,$sql);
  header("location:profile.php");
  
}
  
  ?>
 <div class="venom-col m7">
    
      <div class="venom-row-padding">
        <div class="venom-col m12">
          <div class="venom-card venom-round venom-white">
            <div class="venom-container venom-padding">
              <h6 class="venom-opacity">write a blog post</h6>
  <form action="" method="post" enctype="multipart/form-data" >
     <h9>Upload Photo:<font color="red">(max 2 mb)</font></h9><br>
     <input type="file" class="form-control-row" name="photos1" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser" onchange="return ValidateFileUpload()">
     <input type="file" class="form-control-row" name="photos2" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser1" onchange="return ValidateFileUpload1()">
     <input type="file" class="form-control-row" name="photos3" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser2" onchange="return ValidateFileUpload2()" >
     <input type="file" class="form-control-row" name="photos4" accept="image/*" style=" max-width: 100%; max-height: 100%; margin-bottom: 2%;" id="fileChooser3" onchange="return ValidateFileUpload3()" ><br>
     <img src="images/noimg.jpg" id="blah"  style="height: 60px;width: auto; margin-left: 5%;" alt="">
     <img src="images/noimg.jpg" id="blah1" style="height: 60px;width: auto;margin-left: 2%;" alt="">
     <img src="images/noimg.jpg" id="blah2" style="height: 60px;width: auto;margin-left: 2%;" alt="">
     <img src="images/noimg.jpg" id="blah3" style="height: 60px;width: auto;margin-left: 2%;" alt=""><hr>
     Blog Heading:
     <input type="text" name="blog_head" maxlength="255" style=" width: 100%; height:30px;" placeholder="heading maxlength 255" required /><br>
              short Summary :
              <textarea contenteditable="true" name="blog_dtl" class="venom-border venom-padding"  maxlength="500" placeholder="Blog short detail under 500" style=" width: 100%; height:60px;resize: none;" required></textarea><br>

              Blog:  
              <textarea contenteditable="true" name="blog_body" class="venom-border venom-padding" placeholder="Status: Write a blog"  style=" width: 100%; height:130px;resize: none;" required></textarea>
              <button type="submit" class="venom-button venom-theme" name="post" style="background-color:#91BFE5FF;"><i class=""></i> &nbsp;Post</button> 
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php  //$idu=$_SESSION['id']['id'];
       $sql1="select * from user_post where blog_id='$iid' ORDER BY id DESC";
      $req1=mysqli_query($con,$sql1);
      while($arr1=mysqli_fetch_assoc($req1)){?>
      <div class="venom-container venom-card venom-white venom-round venom-margin" id="<?php echo $arr1['id']?>"><br>
        <img src="<?php echo $_SESSION['id']['p_photo']; ?>" alt="Avatar" class="venom-left venom-circle venom-margin-right" style="width:30px; height:30px;">
        <span class="venom-right venom-opacity"><?php echo $arr1['time']?></span>
        <a href="profile.php"><h6><?php echo $_SESSION['id']['name'].'&nbsp'.$_SESSION['id']['last_name'] ?></h6></a>
        <hr class="venom-clear">
        <h5><?php echo $arr1['blog_head']?></h5>
        <p><?php echo $arr1['blog_dtl']?></p>
          <div class="venom-row-padding" style="margin:0 -16px">
            <?php $i=1; 
            if(!empty($arr1['photos1']) && $i<=2){?>
            <div class="venom-half">
              <img src="post/<?php echo $arr1['photos1']?>" style="width:100%;height:200px;padding-right: 0px; "class="venom-margin-bottom" alt="">
            </div>
            <?php  $i=$i+1;}?>
            <?php if(!empty($arr1['photos2']) && $i<=2){?>
            <div class="venom-half">
              <img src="post/<?php echo $arr1['photos2']?>" style="width:100%;height:200px;padding: 0px;"class="venom-margin-bottom" alt="">
          </div>
          <?php  $i=$i+1;}?>
            <?php if(!empty($arr1['photos3'])&& $i<=2){?>
          <div class="venom-half">
              <img src="post/<?php echo $arr1['photos3']?>" style="width:100%;height:200px;"class="venom-margin-bottom" alt="">
          </div>
          <?php $i=$i+1;}?>
            <?php if(!empty($arr1['photos4'])&& $i<=2){?>
          <div class="venom-half">
              <img src="post/<?php echo $arr1['photos4']?>" style="width:100%;height:200px;"class="venom-margin-bottom" alt="">
          </div>
          <?php }  
             $repoid=$arr1['id'];
          $sqlresultre="select * from report where post_id='$repoid'";
                  $quryresultre=mysqli_query($con,$sqlresultre);
                  $rowresultre=mysqli_num_rows($quryresultre);
                  if ($rowresultre>0 && $rowresultre<=10) {
                    echo '<p class="text-center" style="color:red;">'.$rowresultre.' Reported,Your Blog will be blocked after 10 report update your post</p>';
                  }
                  else if ($rowresultre>10) {
                    echo '<p class="text-center" style="color:red;">Your Blog was blocked  update post to make it visible</p>';
                  }
                  ?>
          <input type="hidden" value="<?php echo $arr1['id']?>">
        </div>
        <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"><button type="submit" class="venom-button venom-theme-d1 venom-margin-bottom" style="background-color: #A2D461FF;"><img src="photos/rdmore.png" style="height: 20px;margin: 0px;padding: 0px;"> &nbsp Read More</button></a> 
        <div >
          <!--====================POST UPDATE  MODEL================================-->
        <a href="profile.php?action=del&id=<?php echo base64_encode($arr1['id'])?>"><button type="submit" id="dt" class="venom-button venom-theme-d2 venom-margin-bottom" style="width: 49%;background-color:#D6767DFF;"><img src="photos/del.png" style="height: 20px;margin: 0px;padding: 0px;"> &nbsp Delete</button> </a>

        <a href="updatepost.php?id=<?php echo base64_encode($arr1['id'])?>"><button type="submit" id="et" class=" venom-button venom-theme-d2 venom-margin-bottom" style="width: 49%;background-color: #99FD8BFF;"><img src="photos/dd.png" style="height: 20px;margin: 0px;padding: 0px;"> &nbsp Edit</button></a>
        </div>
        <div class="venom-container venom-white">
    <p><?php 
             $getupdate=$arr1['id'];
             $sqllike1 = "select id from likes where  post_id='$getupdate' "; //get like data from database

                 $reslike1 = mysqli_query($con,$sqllike1); //run query

                  $rowlike1 = mysqli_num_rows($reslike1); //fatch row
                  $rowlike1; //this is to get like rows

        $querseen2="select * from view where post_id= '$getupdate' AND user_id!='NULL'";
        $reqseen2=mysqli_query($con,$querseen2);
        $arrseen2=mysqli_num_rows($reqseen2);// to get seen by register user
        $querseen3="select * from view where post_id= '$getupdate' AND user_id='NULL'";
        $reqseen3=mysqli_query($con,$querseen3);
        $arrseen3=mysqli_num_rows($reqseen3); //to get unregister user

      
         $sql32="select * from comments where blog_id=$getupdate";
  $req32=mysqli_query($con,$sql32);
  //$arr32=mysqli_fetch_assoc($req32);
     $row32 = mysqli_num_rows($req32);                

          ?><!--form to creat like unlike formet-->
             <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="liked By"><img class="rounded-circle" src="photos/liked.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $rowlike1;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen2;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen3;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 48%;cursor: pointer;"><abbr title="comments"><img class="rounded-circle" src="photos/images.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr><?php echo $row32;?></span>
    </p>
    </div>
      </div>
        <?php  } ?>
    <!-- End Middle Column -->
    <h2 style="width: 20px;height: 20px;border-radius: 50%;background-color:#00AAFF6F;margin-left: 49%;"></h2>
    </div>
    <!-- Right Column -->
    <div class="venom-col m2">
      <div class="venom-card venom-round venom-white venom-center">
        <div class="venom-container">
          <p>New Bloger</p>
          <?php 
           $user=$_SESSION['id']['id'];
       $sqluser="select * from user_login where id!='$user' ORDER BY id DESC limit 2";
       $requser=mysqli_query($con,$sqluser);
                  while($arruser=mysqli_fetch_assoc($requser)){?>
          <a href="ucbloger.php?id=<?php echo base64_encode($arruser['id']) ?>"><p><img src="<?php echo $arruser['p_photo']?>" alt="" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
          <strong><?php echo $arruser['name'].'&nbsp'.$arruser['last_name']?></strong></p></a>
          <?php }?>
        </div>
      </div>
      <br>
      <?php $sqlbd="select * from user_login where id='$iid'";
            $querybd=mysqli_query($con,$sqlbd);
            $getbd=mysqli_fetch_assoc($querybd);

            $bdy=$getbd['b_date'].$getbd['b_day'];
            $bdy;
            $timebd=time();
            $current_date=date('dm');
            $current_date;
      ?>
      <div class="venom-card venom-round venom-white venom-center">
           <?php if($current_date==$bdy){?>
        <div class="venom-container" style="padding: 3px;">
         
          <p class="lead text-muted">Hi <?php echo $_SESSION['id']['name'].'&nbsp'.$_SESSION['id']['last_name'] ?></p>
          <img src="photos/bd.jpg" alt="Avatar" style="width:50%"><br>
          <span class="lead text-muted">Wish You A Verry Happy Birth Day </span>
       
          
        </div>
           <?php }?>
           <hr>
           <?php 
        $sqldy="select * from Important";
            $querydy=mysqli_query($con,$sqldy);
            while($getdy=mysqli_fetch_assoc($querydy)){
            $idy=$getdy['date'].$getdy['day'];
            $idy;

        if($current_date==$idy){?>
        <div class="venom-container" style="padding: 3px;">
          <span class="lead text-muted"><?php echo $getdy['Important']?> </span>
       
          
        </div>
        <hr >
           <?php }}?>
      </div>
      <br>
      
      <div class="venom-card venom-round venom-green venom-padding-16 venom-center">
        <a href="blogerprofile.php"><span class="venom-tag" style="width: 100%;background-color:#4CAF50">Browse Blogger's Profile</span></a>
      </div>
      <br>
      
      <div class="venom-card venom-round venom-white  venom-center" style="padding: 10px;">
        <p><a href="aboutus.php#help">Need Help</a></p>
        <p><a href="aboutus.php#contact">Contact us</a></p>
        <p>&copy Travel Blog <?php echo date("Y");?> </p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<!--================================================================================
===========================page update start here===================================
=================================================================================-->

<?php
  $iid=$_SESSION['id']['id'];
  if(isset($_REQUEST['butt']))
  { 
    $name1= str_replace('<', ' ', $_REQUEST['name1']);
    $last_name= str_replace('<', ' ',$_REQUEST['last_name']);
    $work= str_replace('<', ' ', $_REQUEST['work']);
    $email= $_REQUEST['email'];
    $country= str_replace('<', ' ', $_REQUEST['country']);
    $b_date = $_REQUEST['b_date'];
    $b_day = $_REQUEST['b_day'];
    $b_year = $_REQUEST['b_year'];
    $contact = str_replace('<', ' ', $_REQUEST['contact']);

if($b_day==2 && $b_date>28)
{
  if( (0 == $b_year % 4) and (0 != $b_year % 100) or (0 == $b_year % 400) )
    {
  $b_date=29;}
  else{
    $b_date=28;
  }
  
}

    $sql = "update user_login set name='$name1',last_name='$last_name',work='$work',country='$country',b_date='$b_date',b_day='$b_day',b_year='$b_year',contact='$contact' ,email='$email' where id = '$iid'";
  mysqli_query($con,$sql);
  
  header("location:profile.php");
  }
  else
  {
    //header("location:index.php   pattern="[a-zA-Z0-9]+"");
  }
  
  ?>
  <?php // to get a live update

$_SESSION['id']['name'] = (isset($name1) ? $name1 : (isset($_SESSION['id']['name']) ? $_SESSION['id']['name'] : '')); //name

$_SESSION['id']['last_name']= (isset($last_name) ? $last_name : (isset($_SESSION['id']['last_name']) ? $_SESSION['id']['last_name'] : '')); //last_name

$_SESSION['id']['work']= (isset($work) ? $work : (isset($_SESSION['id']['work']) ? $_SESSION['id']['work'] : '')); //for work

$_SESSION['id']['country']= (isset($country) ? $country : (isset($_SESSION['id']['country']) ? $_SESSION['id']['country'] : '')); //for country

$_SESSION['id']['b_date'] = (isset($b_date) ? $b_date : (isset($_SESSION['id']['b_date']) ? $_SESSION['id']['b_date'] : '')); //b_date

$_SESSION['id']['b_day'] = (isset($b_day) ? $b_day : (isset($_SESSION['id']['b_day']) ? $_SESSION['id']['b_day'] : '')); //b_day

$_SESSION['id']['b_year'] = (isset($b_year) ? $b_year : (isset($_SESSION['id']['b_year']) ? $_SESSION['id']['b_year'] : '')); //b_year

$_SESSION['id']['contact'] = (isset($contact) ? $contact : (isset($_SESSION['id']['contact']) ? $_SESSION['id']['contact'] : '')); //contact

$_SESSION['id']['email'] = (isset($_POST['email']) ? $_POST['email'] : (isset($_SESSION['id']['email']) ? $_SESSION['id']['email'] : '')); //email
  //$_SESSION['id']['b_day']='$b_day';
  //$_SESSION['id']['b_year']='$b_year';
  //$_SESSION['id']['contact']='$contact'; ?>
<div id="id03" class="modal">
  <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="photos/img_avatar3.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Enter Name</b></label>
      <input type="text" placeholder="Enter Name" name="name1" maxlength="40" required value="<?php echo $_SESSION['id']['name'] ?>" >

      <label for="uname"><b>Enter Last Name</b></label>
      <input type="text" placeholder="Enter last Name" name="last_name" maxlength="50" value="<?php echo $_SESSION['id']['last_name'] ?>" required >

      <label for="uname"><b>Enter work</b></label>
      <input type="text" placeholder="Enter work" name="work" id="work" value="<?php echo $_SESSION['id']['work'] ?>">

      <label for="uname"><b>Enter country</b></label>
      <input type="text" placeholder="Enter country" name="country" id="country" size="50" placeholder="Enter a location" autocomplete="on" value="<?php echo $_SESSION['id']['country']?>">

      <label for="uname"><b>Enter birth date</b></label><br>
      <input type="number" placeholder="date" name="b_date" id="b_date" min="1" max="31" style="width: 20%; text-align: center;" value="<?php echo $_SESSION['id']['b_date'] ?>">
      
      <input type="number" placeholder="month" name="b_day" id="b_day" min="1" max="12" style="width: 20%; text-align: center;" value="<?php echo $_SESSION['id']['b_day'] ?>">

      <input type="number" placeholder="year" name="b_year" id="b_year" min="<?php echo date("Y")-90; ?>" max="<?php echo date("Y")-4; ?>" style="width: 20%; text-align: center;" value="<?php echo $_SESSION['id']['b_year'] ?>"  > &nbsp&nbsp&nbsp<abbr title="the month of February has 28 days in common years and 29 days in leap years">?</abbr><br><br>
      <label for="uname"><b>Enter email</b></label>
      <input type="text" placeholder="Enter E-mail" name="email" id="email" value="<?php echo $_SESSION['id']['email'] ?>" pattern="[a-z0-9._%+-]+@gmail+\.[a-z]{2,63}$"><br><br>

      <label for="uname"><b>Enter contact</b></label>
      <input type="text" placeholder="Enter contact (e-mail/phone)" name="contact" id="contact" value="<?php echo $_SESSION['id']['contact'] ?>">

        
      <button type="submit" name="butt">save</button>
    </div>
    <div class="container" style="background-color:#fefefe">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button></div>
    </form>
    </div>
<!--========================bio update end here=================================-->
<!--======================profile pic update start here==========================-->
<?php
  //$iid=$_SESSION['id']['id'];
  if(isset($_REQUEST['but3']))
  {

    if($_FILES['photo']['name']!="")
  {
  $photo_name= time().$_FILES['photo']['name'];
  $tmp= $_FILES['photo']['tmp_name'];
  $des= "upload/";
  $dest=$des.basename($photo_name);

  if(move_uploaded_file($tmp,$dest))
  {
   $sql = "update user_login set p_photo='$dest' where id = '$iid'";
  mysqli_query($con,$sql);
  $_SESSION['id']['p_photo'] = $dest;
  header("location:profile.php");
}
  }
}
  ?>
  <?php
  //set the photo to the default 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="dele")
  {
    
    $dest='upload/images.png';
   $sql = "update user_login set p_photo='$dest' where id = '$iid'";
  mysqli_query($con,$sql);
  $_SESSION['id']['p_photo'] = $dest;
  header("location:profile.php");
}

?>
<div id="id04" class="modal">
  <form class="modal-content animate" action="" method="post" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>

      <label for="uname"><b>Profile Picture</b></label>
        
                <img src="<?php echo $_SESSION['id']['p_photo']?>" style="height: 300px;width: 300px; max-width: 100%; max-height: 100%;" />
                <h4>Upload New Photo</h4><input type="file" class="form-control-row" name="photo" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser0" onchange="return ValidateFileUpload0()"><small style="color:red">(under 2mb)</small><img src="" id="blah0"  style="height: 50px;width: auto; margin-left: 1%;border: 1px solid;" alt="">

        
      <button type="submit" name="but3">save</button>
    </div>
    <div class="container" style="background-color:#fefefe">
      <a href="profile.php?action=dele&id=<?php echo $_SESSION['id']['id']?>"><button type="button" class="cancelbtn" style="background-color: #000;">Delete</button></a>
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button></div>
    </form>
    </div>
<!-- page update end here -->
<!--validation of imge to get verifi-->
<SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                   if (fuData.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

                      
            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser").value = '';
        return false;

            }

        }

        
    }

    function ValidateFileUpload1() {
        var fuData1 = document.getElementById('fileChooser1');
        var FileUploadPath1 = fuData1.value;

//To check if user upload any file
        if (FileUploadPath1 == '') {
            alert("Please upload an image");

        } else {
            var Extension1 = FileUploadPath1.substring(
                    FileUploadPath1.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension1 == "gif" || Extension1 == "png" || Extension1 == "bmp"
                    || Extension1 == "jpeg" || Extension1 == "jpg") {

// To Display
                if (fuData1.files && fuData1.files[0]) {
                  if (fuData1.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser1").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah1').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData1.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser1").value = '';
        return false;

            }
        }
    }

    function ValidateFileUpload2() {
        var fuData2 = document.getElementById('fileChooser2');
        var FileUploadPath2 = fuData2.value;

//To check if user upload any file
        if (FileUploadPath2 == '') {
            alert("Please upload an image");

        } else {
            var Extension2 = FileUploadPath2.substring(
                    FileUploadPath2.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension2 == "gif" || Extension2 == "png" || Extension2 == "bmp"
                    || Extension2 == "jpeg" || Extension2 == "jpg") {

// To Display
                if (fuData2.files && fuData2.files[0]) {
                  if (fuData2.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser2").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData2.files[0]);
                }

            } 

//The file upload is NOT an image
else {
               alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser2").value = '';
        return false;

            }
        }
    }

    function ValidateFileUpload3() {
        var fuData3 = document.getElementById('fileChooser3');
        var FileUploadPath3 = fuData3.value;

//To check if user upload any file
        if (FileUploadPath3 == '') {
            alert("Please upload an image");

        } else {
            var Extension3 = FileUploadPath3.substring(
                    FileUploadPath3.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension3 == "gif" || Extension3 == "png" || Extension3 == "bmp"
                    || Extension3 == "jpeg" || Extension3 == "jpg") {

// To Display
                if (fuData3.files && fuData3.files[0]) {
                  if (fuData3.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser3").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData3.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser3").value = '';
        return false;

            }
        }
    }
    function ValidateFileUpload0() {
        var fuData0 = document.getElementById('fileChooser0');
        var FileUploadPath0 = fuData0.value;

//To check if user upload any file
        if (FileUploadPath0 == '') {
            alert("Please upload an image");

        } else {
            var Extension0 = FileUploadPath0.substring(
                    FileUploadPath0.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension0 == "gif" || Extension0 == "png" || Extension0 == "bmp"
                    || Extension0 == "jpeg" || Extension0 == "jpg") {

// To Display
                if (fuData0.files && fuData0.files[0]) {
                  if (fuData0.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser0").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah0').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData0.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser0").value = '';
        return false;

            }
        }
    }
</SCRIPT>
<!--END OF IMG VALIDATION-->
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("venom-show") == -1) {
        x.className += " venom-show";
        x.previousElementSibling.className += " venom-theme-d1";
    } else { 
        x.className = x.className.replace("venom-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" venom-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("venom-show") == -1) {
        x.className += " venom-show";
    } else { 
        x.className = x.className.replace(" venom-show", "");
    }
}
// Get the modal
var modal = document.getElementById('id03');
var modal = document.getElementById('id04');
var modal = document.getElementById('id003');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>
<!--this is for search location-->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>


<!--================================================-->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&region=in" type="text/javascript"></script>
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('country');
      var autocomplete = new google.maps.places.Autocomplete(input);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
  </body></html>