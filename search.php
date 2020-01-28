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
</head>
<body>
  <?php require('slice/header.php');
 ?>
        <form action="" method="post">
            <div class="input-group" style="width: 50%;margin-top: 3%;margin-left: 22%;">
              <input type="text" name="search" class="form-control" placeholder="Search for..." style="width: 50%;">
              <span class="input-group-btn" style="padding-top: 8px;">
                <button class="btn btn-secondary " type="submit" name="submit">Go!</button>
              </span>
            </div>
            </form>
            <?php
  if(isset($_POST['submit'])){
           $search=$_POST['search'];
           header('location:search.php?id='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
         <?php   $getresult=$_REQUEST['id'] ;  

         $sql0="select * from user_post where (blog_dtl like '%" . str_replace( ' ', '%\' AND blog_dtl LIKE \'%', $getresult ) . '%\') OR (blog_head like' ."'".'%'. str_replace( ' ', '%\' AND blog_head LIKE \'%', $getresult ) . '%\')';
        $req0=mysqli_query($con,$sql0);
         $row = mysqli_num_rows($req0);

         $sql_profile="select * from user_login where (name like '%" . str_replace( ' ', '%\' AND name LIKE \'%', $getresult ) . '%\') 
         OR (last_name like' ."'".'%'. str_replace( ' ', '%\' AND last_name LIKE \'%', $getresult ) . '%\')
         OR (username=' ."'". str_replace( ' ', '\' AND username='."'", $getresult )."'".')
         OR (email=' ."'". str_replace( ' ', '\' AND email='."'", $getresult ) ."'".') 
         OR (name like' ."'".'%'. str_replace( ' ', '%\' AND last_name LIKE \'%', $getresult ) . '%\') 
         OR (country like' ."'".'%'. str_replace( ' ', '%\' AND country LIKE \'%', $getresult ) . '%\') OR (country LIKE '."'%".$getresult."%'".')';

   // echo $sql_profile="select * from user_login where country LIKE '%$getresult%'";
        $req_profile=mysqli_query($con,$sql_profile);
         $row_profile= mysqli_num_rows($req_profile);
         

         if ($row==0 && $row_profile==0) {?>
           <p class="lead text-muted text-center"  style="font-weight: bolder;">Result Not Found ! Please Try Again</p>
         
        <?php } ?>

        <!-- Three columns of text below the carousel -->
        <?php  
      if(!empty($getresult)&& $row_profile>0){?>
            <p class="lead text-muted text-center "  style="font-weight: bolder;margin-top:2%">Search Result For "<?php echo $getresult;?>" In Bloger's Profile</p>
            <hr style="margin: 0px;padding: 0px;">
            <?php }?>
        <div class="row text-center">
          <?php  
      if(!empty($getresult)){
        while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['id'];
          $sql13="select * from user_post where blog_id=$ird";
          $re13=mysqli_query($con,$sql13);
         $row2 = mysqli_num_rows($re13);

            ?>
          <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item  shadow-md" style="margin-top: 1%;">
            <img class="rounded-circle" src="<?php echo $arr_profile['p_photo']?>" width="140" height="140">
            <h3><?php echo $arr_profile['name'].'&nbsp';  
            if(strlen($arr_profile['name'])>8)
         {
          echo '<br>';
         }
         else if(strlen($arr_profile['last_name'])>12){
          echo '<br>';}
         echo $arr_profile['last_name']?></h3>
            <p class="text-center"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Work" style="cursor: pointer;"><img src="photos/work.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr_profile['work'] ?></p>

         <p class="text-center"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Location" style="cursor: pointer;"><img src="photos/home.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr_profile['country'] ?></p>

         <p class="text-center"><i class=" venom-margin-right venom-text-theme"></i><abbr title="Gender" style="cursor: pointer;"><img src="photos/gdr.png" style="width: 8%; height: 8%; padding-right: 6px;"></abbr><?php echo  $arr_profile['gender'] ?></p><!--gender-->
         <p class="text-muted">Total Post :<?php echo  $row2; ?></p>
            <p><a class="btn btn-secondary" href="ucbloger.php?id=<?php echo base64_encode($arr_profile['id']) ?>" role="button">View Profile »</a></p>
          </div><!-- /.col-lg-4 -->
          <?php } }?>
          <hr>
        </div><!-- /.row -->
 
          <div class="container">
            <?php  
      if($row>0 && !empty($getresult)){?>
            <p class="lead text-muted text-center"  style="font-weight: bolder;">Search Result For "<?php echo $getresult;?>" In Blog</p>
            <hr style="margin: 0px;padding: 0px;">
            <?php }?>
      <div class="row">

        <?php  
      if(!empty($getresult)){
        
        while( $arr0=mysqli_fetch_assoc($req0)){?>
        <div class="col-lg-4 col-sm-6 portfolio-item" style="margin-top: 1%;">
          <div class="card h-100">
            <a href="#"><?php if(!empty($arr0['photos1'])){?>
    <img src="post/<?php echo $arr0['photos1']?>" alt="" style="" class="card-img-top">
    <?php }
    else if(!empty($arr0['photos2'])){?>
    <img src="post/<?php echo $arr0['photos2']?>" alt="" style="" class="card-img-top">
    <?php }
    else if(!empty($arr0['photos3'])){?>
    <img src="post/<?php echo $arr0['photos3']?>" alt="" style="" class="card-img-top">
    <?php }
    else if(!empty($arr0['photos4'])){?>
    <img src="post/<?php echo $arr0['photos4']?>" alt="" style="" class="card-img-top">
    <?php }?></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?php echo $arr0['blog_head']?></a>
                <h5>at- <span class="venom-opacity"><?php echo $arr0['time']?></span></h5>
              </h4>
              <p class="card-text"><?php echo $arr0['blog_dtl']?></p>
              <p class="lead mb-0" style="background-color: #1E901A;width: 200px;padding-left: 15px;"><a href="read.php?id=<?php echo base64_encode($arr0['id'])?>" class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
          </div>
        </div>
        <?php }  }?>
      </div>
      <!-- /.row -->
    </div>
  <!-- /.container -->
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