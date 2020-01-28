<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
if (isset($_SESSION['id'])) {
 header("location:profile.php");
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
<body >
  <?php require('slice/header.php');?>
  <div class="text-center" style="width: 30%;margin-left: 35%;">
  <form class="form-signin" action="" method="post">
      <img class="mb-4" src="photos/forgot-password-icon-9.png" alt="" width="72" height="72" style="margin-bottom: 0px;padding-bottom: 0px;margin-top: 3%;">
      <h1 class="h3 mb-3 font-weight-normal">Select Your Account</h1>
      <label for="inputEmail" >*Email address/Username</label>
      <input type="text" id="inputEmail" name="search" class="form-control" placeholder="Email address/Username" required="" autofocus="" style="margin-bottom: 2%;">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" style="background-color: #6AA184FF">Find Profile</button>
    </form>
    </div>
    <?php
  if(isset($_POST['submit'])){
           $search=$_POST['search'];

           header('location:findid.php?id='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
         <?php   $getresult=$_REQUEST['id'] ;
         if($getresult=='travelblog' ||$getresult=='travelblog@gmail.com'){

            echo '<section class="jumbotron text-center" style="height: 200px;padding-top: 0px;margin-top: 1%;background-color: #FF000023;">
        <div class="container" style="height: 100px;color:red;font-size:25px;">
          <h1 class="jumbotron-heading">Sorry You Dont Have Permission to Access</h1>
          </div>
      </section>';
            die();
           }  

          $sql0="select * from user_login where email='$getresult' 
         OR username='$getresult'";
        $req0=mysqli_query($con,$sql0);
        $row = mysqli_num_rows($req0); 
         if ($row==1) {
            $arr0=mysqli_fetch_assoc($req0);
             $user=$arr0['id'];?>

            <div class="container" style="">
      <div class="row text-center">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-10 ">
            <a href="searchpass.php?id=<?php echo base64_encode($arr0['id'])?>"><img class="card-img-top" src="upload/images.png" alt=""></a>
            <div class="card-body">
              <h4><?php echo $arr0['name'].'&nbsp';  
            if(strlen($arr0['name'])>8)
         {
          echo '<br>';
         }
         else if(strlen($arr0['last_name'])>12){
          echo '<br>';}
         echo $arr0['last_name']?></h4>
            </div>
          </div>
        </div>
      </div>
      <p class="text-left"> Not Your Profile Search Again !</p>
    </div>
      <!-- /.row -->
          
       <?php   }elseif ($row==0 && !empty($getresult) ){echo '<p class="mt-5 mb-3 text-center" style="color:red;">Your Search  Does Not Satisfy</p>';} ?>
  <p class="mt-5 mb-3 text-muted text-center">&copy Travel Blog <?php echo date("Y");?> </p>

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