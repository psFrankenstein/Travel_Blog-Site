<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
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
  <link rel="stylesheet" href="css/venom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style type="text/css">body {
  background-color: #FFFFFFFF;
  padding-top: 54px;
  }
  @media (min-width: 992px) {
  body {
  padding-top: 56px;
  }
  }
  hr{color: #f00;
  background-color: #D6D6D6FF;
  height: 1px;}
  .img-fluid{width: 49%;height: auto;}
  .rounded-circle{width:40px;height:auto; cursor: pointer;}
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head><body class="venom-light-grey">
  <?php require('slice/header.php');?>
  <?php 
  $id= $_REQUEST['id'];
    $ied = base64_decode($id); 
    if (empty($id)) {
      header("location:blog.php");
    }
    ?>

<!-- venom-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="venom-content" style="max-width:1400px">

<!-- Header -->
<header class="venom-container venom-center venom-padding-32"> 
  <p>Welcome to the blog of <span class="venom-tag"><?php $sql2="select * from user_login where id=$ied";
  $req2=mysqli_query($con,$sql2);
  $arr2=mysqli_fetch_assoc($req2); echo $arr2['name'];?></span></p>
</header>

<!-- Grid -->
<div class="venom-row">

<!-- Blog entries -->
<div class="venom-col l8 s12">
  <?php 
  $id= $_REQUEST['id'];
    $ied = base64_decode($id); 

  $sql1="select * from user_post where blog_id='$ied' ORDER BY id DESC";
      $req1=mysqli_query($con,$sql1);
                  $rowresultre=mysqli_num_rows($req1);
                 if ($rowresultre<1) {
            echo '<section class="jumbotron text-center" style="height: 200px;padding-top: 0px;margin-top: 1%;background-color:#000A732F;">
        <div class="container" style="height: 100px;">
          <h1 class="jumbotron-heading">'.$arr2['name'].'&nbsp'.$arr2['last_name'].'</h1>
          <p class="lead text-muted"> DON\'t have any blog Post .As soon as he will start to post blog ,the blog\'s will be visible </p></div>
      </section>';
            
                 } ?>
  <!-- Blog entry -->
  <?php 
      while($arr1=mysqli_fetch_assoc($req1)){ ?>
                 
  <div class="venom-card-4 venom-margin venom-white">
    <?php if(!empty($arr1['photos1'])){?>
    <img src="post/<?php echo $arr1['photos1']?>" alt="" style="width:100%;height: 400px;">
    <?php }
    else if(!empty($arr1['photos2'])){?>
    <img src="post/<?php echo $arr1['photos2']?>" alt="" style="width:100%;height: 400px;">
    <?php }
    else if(!empty($arr1['photos3'])){?>
    <img src="post/<?php echo $arr1['photos3']?>" alt="" style="width:100%;height: 400px;">
    <?php }
    else if(!empty($arr1['photos4'])){?>
    <img src="post/<?php echo $arr1['photos4']?>" alt="" style="width:100%;height: 400px;">
    <?php }?>

    <div class="venom-container">
      <h3><b><?php echo $arr1['blog_head']?></b></h3>
      <h5>Time, <span class="venom-opacity"><?php echo $arr1['time']?></span>
      </h5>
    </div>
    <div class="venom-container">
      <p><?php echo $arr1['blog_dtl']?></p>
      <div class="venom-row">
        <div class="venom-col m8 s12">
          <p><a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"><button class="venom-button venom-padding-large venom-white venom-border"><b>READ MORE »</b></button></a></p>
        </div>
        <div class="venom-col m4">
          <?php 
                  $pid=$arr1['id'];
         $sql32="select * from comments where blog_id=$pid";
  $req32=mysqli_query($con,$sql32);
  //$arr32=mysqli_fetch_assoc($req32);
     $row = mysqli_num_rows($req32);                 ?>
          <p><span class="venom-padding-small venom-right"><b>Comments &nbsp</b> <span class="venom-tag"><?php echo $row; ?></span></span></p>
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
             <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/liked.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $rowlike1;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen2;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen3;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;cursor: pointer;"><abbr title="comments"><img class="rounded-circle" src="photos/images.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr><?php echo $row32;?></span>
    </p>
    </div>

      </div>
    </div>
  </div>
  <hr>
  <?php }?>
<!-- END BLOG ENTRIES -->
<h2 style="width: 20px;height: 20px;border-radius: 50%;background-color:#00AAFF6F;margin-left: 49%;"></h2>
</div>
<?php 
    $pid=$arr2['id'];
    ?>
<!-- Introduction menu -->
<div class="venom-col l4">
  <!-- About Card -->
  <div class="venom-card venom-margin venom-margin-top">
  <img src="<?php echo $arr2['p_photo']?>" style="width:100%">
    <div class="venom-container venom-white">
      <h4><b><?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?></b></h4>
         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Work" style="cursor: pointer;"><img src="photos/work.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr2['work'] ?></p>

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Location" style="cursor: pointer;"><img src="photos/home.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr2['country'] ?></p>
            <?php if(isset($_SESSION['id']))
                 {?>
             <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Birth Day" style="cursor: pointer;"><img src="photos/birthday.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo $arr2['b_date'].'/'.$arr2['b_day'].'/'.$arr2['b_year'] ?></p
  
          <?php   }?>
      <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Gender" style="cursor: pointer;"><img src="photos/gdr.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr2['gender'] ?></p><!--gender-->

         <p><i class=" venom-margin-right venom-text-theme"></i><abbr title="Contact" style="cursor: pointer;"><img src="photos/contact.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr2['contact'] ?></p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="venom-card venom-margin">
    <div class="venom-container venom-padding">
      <h4>Popular Posts</h4>
    </div>
    <ul class="venom-ul venom-hoverable venom-white">
      <?php
      $sql11="select * from user_post  ORDER BY RAND() limit 10";
       $req11=mysqli_query($con,$sql11);
                  while($arr11=mysqli_fetch_assoc($req11)){
                       $blg_id=$arr11['blog_id'];
                   $sql22="select * from user_login where id=$blg_id";
  $req22=mysqli_query($con,$sql22);
  $arr22=mysqli_fetch_assoc($req22);
                    ?>
      <li class="venom-padding-16">
        <a href="read.php?id=<?php echo base64_encode($arr11['id']) ?>">
                      <?php if(!empty($arr11['photos1'])){?>
        <img src="post/<?php echo $arr11['photos1']?>" alt="" class="venom-left venom-margin-right" style="width:40px; height:40px;border-radius: 50%;padding: 0px;">
        <?php }
         else if(!empty($arr11['photos2'])){?>
         <img src="post/<?php echo $arr11['photos2']?>" alt="" class="venom-left venom-margin-right" style="width:40px; height:40px;border-radius: 50%;padding: 0px;">
         <?php }
         else if(!empty($arr11['photos3'])){?>
         <img src="post/<?php echo $arr11['photos3']?>" alt="" class="venom-left venom-margin-right" style="width:40px; height:40px;border-radius: 50%;padding: 0px;">
         <?php }
         else if(!empty($arr11['photos4'])){?>
         <img src="post/<?php echo $arr11['photos4']?>" alt="" class="venom-left venom-margin-right" style="width:40px; height:40px;border-radius: 50%;padding: 0px;">
         <?php }
         ?>

        <span class="venom-large">by <?php echo $arr22['name'].'&nbsp'.$arr22['last_name']?></span><br>
        <span><?php echo $arr11['blog_head']?></span></a>
      </li>
      <?php }?>
    </ul>
  </div>
  <hr> 
 
  <!-- Labels / tags -->
  <div class="venom-card venom-margin">
    <div class="venom-container venom-padding">
      <h4>Blogers</h4>
    </div>
    <div class="venom-container venom-white">
    <p><?php 
    $sql21="select * from user_login ORDER BY RAND() limit 8";
  $req21=mysqli_query($con,$sql21);
  while($arr21=mysqli_fetch_assoc($req21)){?>
      <a href="ucbloger.php?id=<?php echo base64_encode($arr21['id']) ?>"><span class="venom-tag venom-light-grey venom-small venom-margin-bottom"><?php echo $arr21['name'].'&nbsp'.$arr21['last_name']?></span><?php }?></a>
    </p>
    </div>
    <p class="text-center text-muted">&copy Travel Blog <?php echo date("Y");?> </p>
  </div>
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END venom-content -->
</div>

<!-- Footer -->
<?php //require('slice/footer.php'); ?>
<!-- Bootstrap core JavaScript -->
<script>
function myFunction(imgs) {
var expandImg = document.getElementById("expandedImg");
var imgText = document.getElementById("imgtext");
expandImg.src = imgs.src;
imgText.innerHTML = imgs.alt;
expandImg.parentElement.style.display = "block";
}
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body></html>