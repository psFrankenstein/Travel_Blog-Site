<?php 
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base

if(isset($_SESSION['id']))
{
  header("location:blog.php");
  
}
else if(!isset($_SESSION['id']))
{
  //header("location:index.php");
  
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
  <style>
body {
  font-family: Verdana, sans-serif;
  margin: 0;
}

* {
  box-sizing: border-box;
}
.row{width: 100%;}
.row > .column {
  padding: 0 5px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 20%;

 
}
/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
}

.column img:hover{
box-shadow:0 0 30px ;
-webkit-box-shadow:0 0 20px rgba(3, 100, 33, 0.63);
/* For I.E */
-moz-box-shadow:0 0 20px;
/* For Mozilla Web Browser*/
border-radius:5px;
-webkit-border-radius:5px;
/* For I.E */
-moz-border-radius:5px
/* For Mozilla Web Browser */
border-bottom-width: 2px;
border-bottom-color: rgba(88, 255, 0, 0.6);

}

</style>

</head>
<body>
   <!-- Navigation -->
  <?php require('slice/header.php'); ?>
<!-- slider -->
  <header >
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <?php
            $sql = "select * from page_body where id='1'";
              $res = mysqli_query($con,$sql);
                $arr = mysqli_fetch_assoc($res);
         ?>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="../admin/<?php echo $arr['photos']?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1><?php echo $arr['head_cont']?></h1>
              <p><?php echo $arr['content']?></p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button" onclick="document.getElementById('id02').style.display='block'">Sign up today</a></p>
            </div>
          </div>
        </div>
        <?php
           $sql = "select * from page_body where id='2'";
                 $res = mysqli_query($con,$sql);
                   $arr = mysqli_fetch_assoc($res);
               ?>
        <div class="carousel-item">
          <img class="second-slide" src="admin/<?php echo $arr['photos']?>" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $arr['head_cont']?></h1>
              <p><?php echo $arr['content']?></p>
              <p><a class="btn btn-lg btn-primary" href="aboutus.php" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <?php
           $sql = "select * from page_body where id='3'";
                 $res = mysqli_query($con,$sql);
                   $arr = mysqli_fetch_assoc($res);
               ?>
        <div class="carousel-item">
          <img class="third-slide" src="../admin/<?php echo $arr['photos']?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption text-right">
              <h1><?php echo $arr['head_cont']?></h1>
              <p><?php echo $arr['content']?></p>
              <p><a class="btn btn-lg btn-primary" href="gallery.php" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div></header>
   <!-- dtl section -->
    <section>
      <?php
           $sql = "select * from page_body where id='4'";
                 $res = mysqli_query($con,$sql);
                   $arr = mysqli_fetch_assoc($res);
               ?>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../admin/<?php echo $arr['photos']?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4"><?php echo $arr['head_cont']?></h2>
              <p><?php echo $arr['content']?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <?php
           $sql = "select * from page_body where id='5'";
                 $res = mysqli_query($con,$sql);
                   $arr = mysqli_fetch_assoc($res);
               ?>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../admin/<?php echo $arr['photos']?>" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4"><?php echo $arr['head_cont']?></h2>
              <p><?php echo $arr['content']?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <?php
           $sql = "select * from page_body where id='6'";
                 $res = mysqli_query($con,$sql);
                   $arr = mysqli_fetch_assoc($res);
               ?>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="../admin/<?php echo $arr['photos']?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4"><?php echo $arr['head_cont']?></h2>
              <p><?php echo $arr['content']?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!DOCTYPE html>

<h2 style="text-align:center">Register to Discover More</h2>

<div class="row">
  <?php $sql1="select * from user_post ORDER BY  RAND() limit 10";
  $req1=mysqli_query($con,$sql1);
   while($arr1=mysqli_fetch_assoc($req1)){?>

    <?php if(!empty($arr1['photos1'])){?>
  <div class="column">
    <img src="post/<?php echo $arr1['photos1']?>" style="width:100%;height: 150px;cursor: pointer;" class="hover-shadow cursor">
  </div>
    <?php }
    else if(!empty($arr1['photos2'])){?>
  <div class="column">
    <img src="post/<?php echo $arr1['photos2']?>" style="width:100%;height: 150px;cursor: pointer;" class="hover-shadow cursor">
  </div>
    <?php }
    else if(!empty($arr1['photos3'])){?>
  <div class="column">
    <img src="post/<?php echo $arr1['photos3']?>" style="width:100%;height: 150px;cursor: pointer;" class="hover-shadow cursor">
  </div>
    <?php }
    else if(!empty($arr1['photos4'])){?>
  <div class="column">
    <img src="post/<?php echo $arr1['photos4']?>" style="width:100%;height: 150px;cursor: pointer;" class="hover-shadow cursor">
  </div>
    <?php } }?>
  
</div>
<?php 
$sql11="select * from comments ";
  $req11=mysqli_query($con,$sql11);
     $row = mysqli_num_rows($req11);
$sql12="select * from user_login ";
  $req12=mysqli_query($con,$sql12);
     $row1 = mysqli_num_rows($req12);
     $sql13="select * from user_post ";
  $req13=mysqli_query($con,$sql13);
     $row2 = mysqli_num_rows($req13);

     $sql1a="select * from user_post ";
  $req1a=mysqli_query($con,$sql1a);
  while ($arr1a=mysqli_fetch_assoc($req1a)) {
         $i1=0;
         $s1=0;
         
    if(!empty($arr1a['photos1'])){$i1=$i1+1;}
    if(!empty($arr1a['photos2'])){$i1=$i1+1;}
    if(!empty($arr1a['photos3'])){$i1=$i1+1;}
    if(!empty($arr1a['photos4'])){$i1=$i1+1;}
      $s1=$s1+$i1;
     $total1+=$s1;
      }
     
      ?>
<section class="jumbotron" style="height: 10%;padding-top: 0px;margin-bottom: 1%;padding-left: 12%;margin-top: 1%;padding-bottom: 0px;">
  <div >
    <p>
  <img src="photos/user.png" style="height: 80px ;width: auto;padding-top: 15px; cursor: pointer;padding-bottom: 0px;"><strong>User &nbsp<?php echo $row1; ?></strong>
  <img src="photos/writing-png-icon-4.png" style="height: 80px ;width: auto;padding-top: 15px;padding-left: 10%;cursor: pointer;padding-bottom: 0px;"><strong> Post&nbsp<?php echo $row2; ?></strong>
  <img src="photos/comment.png" style="height: 60px ;width: auto;padding-top: 15px;padding-left: 10%;cursor: pointer;padding-bottom: 0px;"><strong> Comment&nbsp<?php echo $row; ?></strong>
  <img src="photos/gallery.png" style="height: 60px ;width: auto;padding-top: 15px;padding-left: 7%;cursor: pointer;padding-bottom: 0px;"><strong> Photos&nbsp<?php echo $total1; ?></strong></p>
  </div>
        
      </section>
      
<?php require('slice/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
  </body></html>