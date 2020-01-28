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

  $sql1="select * from user_post ORDER BY id DESC";
  $req1=mysqli_query($con,$sql1);
  //$arr1=mysqli_fetch_assoc($req1);
  ?>

    <main role="main">

      <section class="jumbotron text-center" style="height: 200px;margin-top: 1%;padding-top: 0px;">
        <div class="container" style="height: 100px;">
          <h1 class="jumbotron-heading">Photo Gallery</h1>
          <?php if(isset($_SESSION['id']))
{?>
  
          <p class="lead text-muted">This is public gallery.This is the collection of all photos uploaded by blogers.use the buttons to switch </p>
                  <p>
            <a href="profilegallery.php" class="btn btn-primary my-2">My Gallery</a>
          </p>
      <?php    } else{ ?>
      <p class="lead text-muted">This is public gallery.This is the collection of all photos uploaded by blogers. <font color="red">Register</font> to unlock more..</p>
      <?php }?>
        </div>
      </section>
<?php if(isset($_SESSION['id']))
{?>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php while($arr1=mysqli_fetch_assoc($req1)){ 
            $blog_id=$arr1['blog_id'];
  //fetch login info
  $sql2="select * from user_login where id=$blog_id";
  $req2=mysqli_query($con,$sql2);
  $arr2=mysqli_fetch_assoc($req2); ?>
            <?php if(!empty($arr1['photos1'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
               <a href="post/<?php echo $arr1['photos1']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos1']?>" data-holder-rendered="true"></a> 
                <div class="card-body">
                  <small class="text-muted" style="">by <?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?> </small><small class="text-muted" style="padding-left: 20%;"> <?php echo $arr1['time']?></small>
                 <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"> <p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                </div>
              </div>
            </div>
            <?php }?>
           <?php if(!empty($arr1['photos2'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="post/<?php echo $arr1['photos2']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos2']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <small class="text-muted" style="">by <?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?> </small><small class="text-muted" style="padding-left: 20%;"> <?php echo $arr1['time']?></small>
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"> <p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                </div>
                    
              </div>
            </div>
            <?php }?>
           <?php if(!empty($arr1['photos3'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="post/<?php echo $arr1['photos3']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos3']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <small class="text-muted" style="">by <?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?> </small><small class="text-muted" style="padding-left: 20%;"><?php echo $arr1['time']?></small>
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"> <p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                </div>
              </div>
            </div>
            <?php }?>
           <?php if(!empty($arr1['photos4'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
               <a href="post/<?php echo $arr1['photos4']?>" target="_blank"> <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos4']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <small class="text-muted" style="">by <?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?> </small><small class="text-muted" style="padding-left: 20%;"> <?php echo $arr1['time']?></small>
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"> <p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                </div>
              </div>
            </div>
            <?php } }?>
          </div>
          <h2 style="width: 20px;height: 20px;border-radius: 50%;background-color:#00AAFF6F;margin-left: 49%;"></h2>
        </div>
      </div>
<?php }
else{?>
<div class="text-center">
<img src="photos/bin.png" style="opacity: 0.5;background-color: #FF000062" >
</div>
<?php }?>
    </main>

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