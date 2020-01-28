<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
if(!isset($_SESSION['id']))
{
  header("location:blog.php");
  
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

if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos1='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:profilegallery.php");
  } 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del1")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos2='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:profilegallery.php");
  } 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="del2")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos3='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:profilegallery.php");
  }
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del3")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos4='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:profilegallery.php");
  }
  ?>


    <main role="main">

      <section class="jumbotron text-center" style="height: 200px;padding-top: 0px;">
        <div class="container" style="height: 100px;">
          <h1 class="jumbotron-heading"><?php echo $_SESSION['id']['name']?>'s Photo Gallery</h1>
          <?php if(isset($_SESSION['id']))
{?>
  
          <p class="lead text-muted">This is public gallery.This is the collection of all photos uploaded by blogers.use the buttons to switch </p>
                  <p>
            <a href="gallery.php" class="btn btn-primary my-2">Public Gallery</a>
          </p>
      <?php    } else{ ?>
      <p class="lead text-muted">This is public gallery.This is the collection of all photos uploaded by blogers.log in to unlock more..</p>
      <?php }?>
        </div>
      </section>


      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php 
              $idu=$_SESSION['id']['id'];
       $sql1="select * from user_post where blog_id='$idu' ORDER BY id DESC";
  $req1=mysqli_query($con,$sql1);
            while($arr1=mysqli_fetch_assoc($req1)){ ?>
            <?php if(!empty($arr1['photos1'])){?>
            <div class="col-md-4" style="height: auto;">
              <div class="card mb-4 shadow-sm">
                <a href="post/<?php echo $arr1['photos1']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos1']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"><p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="profilegallery.php?action=del&id=<?php echo base64_encode($arr1['id'])?>">
                      <button type="submit1" class="btn btn-sm btn-outline-secondary"><img src="photos/del1.png" style="height:15px;padding-right: 2px;">Delete</button>
                    </a>
                    </div>
                    <small class="text-muted"><?php echo $arr1['time']?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php  }?>
            <?php if(!empty($arr1['photos2'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
               <a href="post/<?php echo $arr1['photos2']?>" target="_blank"> <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos2']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"><p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="profilegallery.php?action=del1&id=<?php echo base64_encode($arr1['id'])?>">
                        <button type="button" class="btn btn-sm btn-outline-secondary"><img src="photos/del1.png" style="height:15px;padding-right: 2px;">Delete</button></a>
                    </div>
                    <small class="text-muted"><?php echo $arr1['time']?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php  }?>
            <?php if(!empty($arr1['photos3'])){?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="post/<?php echo $arr1['photos3']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos3']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                 <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"> <p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="profilegallery.php?action=del2&id=<?php echo base64_encode($arr1['id'])?>">
                        <button type="button" class="btn btn-sm btn-outline-secondary"><img src="photos/del1.png" style="height:15px;padding-right: 2px;">Delete</button></a>
                    </div>
                    <small class="text-muted"><?php echo $arr1['time']?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php  }?>
            <?php if(!empty($arr1['photos4'])){?>
            <div class="col-md-4" >
              <div class="card mb-4 shadow-sm">
                <a href="post/<?php echo $arr1['photos4']?>" target="_blank"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="height: 225px; width: 100%; display: block;" src="post/<?php echo $arr1['photos4']?>" data-holder-rendered="true"></a>
                <div class="card-body">
                  <a href="read.php?id=<?php echo base64_encode($arr1['id'])?>"><p class="card-text"><?php echo $arr1['blog_head']?></p></a>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                     <a href="profilegallery.php?action=del3&id=<?php echo base64_encode($arr1['id'])?>">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><img src="photos/del1.png" style="height:15px;padding-right: 2px;">Delete</button></a>
                    </div>
                    <small class="text-muted"><?php echo $arr1['time']?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php  } }?>
          </div>
          <h2 style="width: 20px;height: 20px;border-radius: 50%;background-color:#00AAFF6F;margin-left: 49%;"></h2>
        </div>
      </div>

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