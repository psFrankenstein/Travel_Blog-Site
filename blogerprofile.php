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
  rounded-circle{width:100px;height:auto; cursor: pointer;}
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}

</style>
</head><body class="venom-light-grey">
  <?php require('slice/header.php');?>
  <?php 
  $sid=$_SESSION['id']['id'];
  $sq11="select * from user_login where id!='$sid'";
  $re11=mysqli_query($con,$sq11);
  ?>

<div class="container marketing text-center">
      <p class="lead text-muted text-center" style="font-size: 20px;font-weight: bolder;">Bloger's Profile</p>

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <?php 
          while($ar11=mysqli_fetch_assoc($re11)){ 
            $ird=$ar11['id'];
          $sql13="select * from user_post where blog_id=$ird";
          $re13=mysqli_query($con,$sql13);
         $row2 = mysqli_num_rows($re13);
                /*$ird=$ar11['id'];
     $sql11="select * from comments where u_id=$ird ";
  $req11=mysqli_query($con,$sql11);
     $row = mysqli_num_rows($req11); 
style="border-radius: 50%;height: 140px;width: 140px;margin-left: 22%;"
     */      
   ?>
          <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item  shadow-md" style="margin-bottom: 1%;margin-right: 1%;background-color:#f7f7ff;padding-top: 5px;margin: 0px;" > <div class="card h-100">
            <img class=" card-img-top" src="<?php echo $ar11['p_photo']?>" alt="Generic placeholder image" width="140" height="140" style="border-radius: 50">
            <h3><?php echo $ar11['name'].'&nbsp';  
            if(strlen($ar11['name'])>8)
         {
          echo '<br>';
         }
         else if(strlen($ar11['last_name'])>12){
          echo '<br>';}
         echo $ar11['last_name']?></h3>
            <p class="text-left"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Work" style="cursor: pointer;"><img src="photos/work.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $ar11['work'] ?></p>

         <p class="text-left"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Location" style="cursor: pointer;"><img src="photos/home.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $ar11['country'] ?></p>

         <p class="text-left"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Gender" style="cursor: pointer;"><img src="photos/gdr.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $ar11['gender'] ?></p><!--gender-->
         <p class="text-muted">Total Post :<?php echo  $row2; ?></p>
            <p><a class="btn btn-secondary" href="ucbloger.php?id=<?php echo base64_encode($ar11['id']) ?>" role="button">View Profile »</a></p>
          </div>
          </div><!-- /.col-lg-4 -->
         <?php }?>
        </div><!-- /.row -->
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