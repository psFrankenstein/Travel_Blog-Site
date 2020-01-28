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
  <link rel="stylesheet" href="css/w3.css">
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
  </style>
</head>
<body>
  <?php require('slice/header.php');
  
   $sql1="select * from user_post ORDER BY RAND() ";
   $req1=mysqli_query($con,$sql1);
  $arr1=mysqli_fetch_assoc($req1);
    $blog_id=$arr1['id'];

    $sql0="select * from user_post where id!='$blog_id' ORDER BY RAND()  ";
     $req0=mysqli_query($con,$sql0);
    $arr0=mysqli_fetch_assoc($req0);
    $blog_id1=$arr0['id'];

     $sql11="select * from user_post where id!='$blog_id' AND id!='$blog_id1' ORDER BY RAND()  ";
     $req11=mysqli_query($con,$sql11);
    $arr11=mysqli_fetch_assoc($req11);
    $blog_id2=$arr11['id'];

   $sql12="select * from user_post where id!='$blog_id' AND id!='$blog_id1'AND id!='$blog_id2' ORDER BY id DESC";
     $req12=mysqli_query($con,$sql12);
    
  ?>
  
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" style="margin-top: 10px;background-image:url(post/<?php 
      if(!empty($arr1['photos1'])){
    echo $arr1['photos1'];
  }
 else if(!empty($arr1['photos2'])){
    echo $arr1['photos2'];
  }
  else if(!empty($arr1['photos3'])){
    echo $arr1['photos3'];
  }
  else if(!empty($arr1['photos4'])){
    echo $arr1['photos4'];
  }

  ?>);background-repeat: no-repeat;background-size: 100%  120%;">
    <header class="blog-header py-3" style="">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#"></a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#"></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <!-- Search Widget -->
        <div class="card-body">
          <form action="" method="post">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search for...">
            <span class="input-group-btn" style="margin-top: 7.5px;">
              <button class="btn btn-secondary"  type="submit" name="submit">Go!</button>
            </span>
          </div>
        </form>
        </div>
        <?php
  if(isset($_POST['submit'])){
           $search=$_POST['search'];
           header('location:search.php?id='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
        
      </div>
    </div>
  </header>
  <?php $sql2="select * from user_post where id='$blog_id' ";
   $req2=mysqli_query($con,$sql2);
  $arr2=mysqli_fetch_assoc($req2);
   $str='5F1414';
   $suff=str_shuffle($str);
  ?>
    <div class="col-md-6 px-0" >
      <h1 class="display-4 font-italic" style="color: <?php echo '#'.$suff;?>; "><?php echo $arr2['blog_head']?></h1>
      <p class="lead my-3"><?php echo $arr2['blog_dtl']?></p>
      <p class="lead mb-0" style="background-color: #1E901A;width: 200px;padding-left: 15px;"><a href="read.php?id=<?php echo base64_encode($arr2['id'])?>" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
  <?php  $sql3="select * from user_post where id='$blog_id1' ";
   $req3=mysqli_query($con,$sql3);
  $arr3=mysqli_fetch_assoc($req3);
  $blgid=$arr3['blog_id'];
  $blgid1=$arr3['id'];

  $sqll="select * from user_login where id=$blgid";
  $reql=mysqli_query($con,$sqll);
  $arrl=mysqli_fetch_assoc($reql);
    $pid=$arrl['id'];

   ?>
  <div class="row mb-2" >
    <div class="col-md-6" ">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <strong class="d-inline-block mb-2 text-primary">by <?php echo $arrl['name'].'&nbsp'.$arrl['last_name']?></strong>
          <h3 class="mb-0">
          <a class="text-dark" href="read.php?id=<?php echo base64_encode($arr3['id'])?>"><?php echo $arr3['blog_head']?></a>
          </h3>
          <div class="mb-1 text-muted"><?php echo $arr3['time']?></div>
          <p class="card-text mb-auto"><?php echo $arr3['blog_dtl']?></p>
          <p  style="background-color: #E9F9A4;width: 200px;padding-left: 15px;">
          <a href="read.php?id=<?php echo base64_encode($arr3['id'])?>">Continue reading</a></p>
        </div>
        <?php if(!empty($arr3['photos1'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr3['photos1']?>" data-holder-rendered="true">
        <?php }
         else if(!empty($arr3['photos2'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr3['photos2']?>" data-holder-rendered="true">
        <?php }
        else if(!empty($arr3['photos3'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr3['photos3']?>" data-holder-rendered="true">
        <?php }
         else if(!empty($arr3['photos4'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr3['photos4']?>" data-holder-rendered="true">
        <?php }?>
              <p class="card-text mb-auto"><div class="venom-container venom-white">
    <p><?php 
             //$getupdate=$arr1['id'];
             $sqllike = "select id from likes where  post_id='$blgid1' "; //get like data from database

                 $reslike = mysqli_query($con,$sqllike); //run query

                  $rowlike = mysqli_num_rows($reslike); //fatch row
                  $rowlike; //this is to get like rows

        $querseen="select * from view where post_id= '$blgid1' AND user_id!='NULL'";
        $reqseen=mysqli_query($con,$querseen);
        $arrseen=mysqli_num_rows($reqseen);// to get seen by register user
        $querseen1="select * from view where post_id= '$blgid1' AND user_id='NULL'";
        $reqseen1=mysqli_query($con,$querseen1);
        $arrseen1=mysqli_num_rows($reqseen1); //to get unregister user

      
         $sqli32="select * from comments where blog_id=$blgid1";
  $reqi32=mysqli_query($con,$sqli32);
  //$arr32=mysqli_fetch_assoc($req32);
     $rowi32 = mysqli_num_rows($reqi32);                

          ?><!--form to creat like unlike formet-->
             <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="liked By"><img class="rounded-circle" src="photos/liked.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $rowlike;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen1;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left:1%;cursor: pointer;"><abbr title="comments"><img class="rounded-circle" src="photos/images.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr><?php echo $rowi32;?></span>
    </p>
    </div></p>
      </div>
      <?php  $sql4="select * from user_post where id='$blog_id2' ";
   $req4=mysqli_query($con,$sql4);
  $arr4=mysqli_fetch_assoc($req4);
   $blid=$arr4['blog_id'];

  $sqla="select * from user_login where id=$blid";
  $reqa=mysqli_query($con,$sqla);
  $arra=mysqli_fetch_assoc($reqa);
     $pid=$arra['id'];

   ?>
    </div>
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <strong class="d-inline-block mb-2 text-success">by <?php echo $arra['name'].'&nbsp'.$arra['last_name']?></strong>
          <h3 class="mb-0">
          <a class="text-dark" href="read.php?id=<?php echo base64_encode($arr4['id'])?>"><?php echo $arr4['blog_head']?></a>
          </h3>
          <div class="mb-1 text-muted"><?php echo $arr4['time']?></div>
          <p class="card-text mb-auto"><?php echo $arr4['blog_dtl']?></p>
          <p  style="background-color: #E9F9A4;width: 200px;padding-left: 15px;">
          <a href="read.php?id=<?php echo base64_encode($arr4['id'])?>">Continue reading</a></p>
        </div>
        <?php if(!empty($arr4['photos1'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr4['photos1']?>" data-holder-rendered="true">
        <?php }
         else if(!empty($arr4['photos2'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr4['photos2']?>" data-holder-rendered="true">
        <?php }
        else if(!empty($arr4['photos3'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr4['photos3']?>" data-holder-rendered="true">
        <?php }
         else if(!empty($arr4['photos4'])){?>
        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="post/<?php echo $arr4['photos4']?>" data-holder-rendered="true">
        <?php }?>
             <div class="venom-container venom-white">
    <p><?php 
             //$getupdate=$arr1['id'];
             $sqllike1 = "select id from likes where  post_id='$blog_id2' "; //get like data from database

                 $reslike1 = mysqli_query($con,$sqllike1); //run query

                  $rowlike1 = mysqli_num_rows($reslike1); //fatch row
                  $rowlike1; //this is to get like rows

        $querseen2="select * from view where post_id= '$blog_id2' AND user_id!='NULL'";
        $reqseen2=mysqli_query($con,$querseen2);
        $arrseen2=mysqli_num_rows($reqseen2);// to get seen by register user
        $querseen3="select * from view where post_id= '$blog_id2' AND user_id='NULL'";
        $reqseen3=mysqli_query($con,$querseen3);
        $arrseen3=mysqli_num_rows($reqseen3); //to get unregister user

      
         $sql32="select * from comments where blog_id=$blog_id2";
  $req32=mysqli_query($con,$sql32);
  //$arr32=mysqli_fetch_assoc($req32);
     $row32 = mysqli_num_rows($req32);                

          ?><!--form to creat like unlike formet-->
             <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="liked By"><img class="rounded-circle" src="photos/liked.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $rowlike1;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen2;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen3;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left:1%;cursor: pointer;"><abbr title="comments"><img class="rounded-circle" src="photos/images.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr><?php echo $row32;?></span>
    </p>
    </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Content -->
<div class="container" style="width: 90%;">
  <!-- Page Heading -->
  <h3 class="my-4" >Blogs by Blogers
  <small>..</small>
  </h3>
  <div class="row">
   <?php 
   

   while($arr12=mysqli_fetch_assoc($req12)){ 
      $bloggwt=$arr12['id'];
     $blog_id3=$arr12['blog_id'];
    $sql13="select * from user_login where id=$blog_id3";
  $req13=mysqli_query($con,$sql13);
  $arr13=mysqli_fetch_assoc($req13);
    $pid=$arr13['id'];
    ?>
    <div class="col-lg-4 col-sm-5 portfolio-item">
      <div class="card h-100">
        <?php if(!empty($arr12['photos1'])){?>
        <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>"><img class="card-img-top" src="post/<?php echo $arr12['photos1']?>" alt="" style="width: 100%;height: 200px;" ></a>
        <?php }
         else if(!empty($arr12['photos2'])){?>
        <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>"><img class="card-img-top" src="post/<?php echo $arr12['photos2']?>" alt="" style="width: 100%;height: 200px;" ></a>
        <?php }
        else if(!empty($arr12['photos3'])){?>
        <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>"><img class="card-img-top" src="post/<?php echo $arr12['photos3']?>" alt="" style="width: 100%;height: 200px;" ></a>
        <?php }
        else if(!empty($arr12['photos4'])){?>
        <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>"><img class="card-img-top" src="post/<?php echo $arr12['photos4']?>" alt="" style="width: 100%;height: 200px;" ></a>
        <?php }?>
        <div class="card-body">
          <strong class="d-inline-block mb-2 text-success">by <?php echo $arr13['name'].'&nbsp'.$arr13['last_name']?></strong>
          <div class="mb-1 text-muted"><?php echo $arr12['time']?></div>
          <h4 class="card-title">
          <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>"><?php echo $arr12['blog_head']?></a>
          </h4>
          <p class="card-text"><?php echo $arr12['blog_dtl']?></p>
          <h4 class="card-title" style="background-color: #E9F9A4;width: 200px;padding-left: 15px;">
          <a href="read.php?id=<?php echo base64_encode($arr12['id'])?>">Read more..</a>
          </h4>
        <div class="venom-container venom-white">
    <p><?php 
             //$getupdate=$arr1['id'];
             $sqllike11 = "select id from likes where  post_id='$bloggwt' "; //get like data from database

                 $reslike11 = mysqli_query($con,$sqllike11); //run query

                  $rowlike11 = mysqli_num_rows($reslike11); //fatch row
                  $rowlike11; //this is to get like rows

        $querseen21="select * from view where post_id= '$bloggwt' AND user_id!='NULL'";
        $reqseen21=mysqli_query($con,$querseen21);
        $arrseen21=mysqli_num_rows($reqseen21);// to get seen by register user
        $querseen31="select * from view where post_id= '$bloggwt' AND user_id='NULL'";
        $reqseen31=mysqli_query($con,$querseen31);
        $arrseen31=mysqli_num_rows($reqseen31); //to get unregister user

      
         $sql321="select * from comments where blog_id=$bloggwt";
  $req321=mysqli_query($con,$sql321);
  //$arr32=mysqli_fetch_assoc($req32);
     $row321 = mysqli_num_rows($req321);                

          ?><!--form to creat like unlike formet-->
             <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="liked By"><img class="rounded-circle" src="photos/liked.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $rowlike11;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen21;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 1%;cursor: pointer;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr> <?php echo $arrseen31;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left:1%;cursor: pointer;"><abbr title="comments"><img class="rounded-circle" src="photos/images.png" alt="" style="height: 20px;width:auto;cursor: pointer;"></abbr><?php echo $row321;?></span>
    </p>
    </div>
        </div>
      </div>
    </div>
 <?php }?>
</div>
<h2 style="width: 20px;height: 20px;border-radius: 50%;background-color:#00AAFF6F;margin-left: 49%;"></h2>
</div>
<!-- /.row -->

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