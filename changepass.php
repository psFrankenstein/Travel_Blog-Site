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
<body >
  <?php require('slice/header.php');?>

     <?php   $getresult=base64_decode($_REQUEST['id']) ;
                $iid= $getresult; 
               if (empty($getresult)) {
                  header('location:findid.php');
                } 

          $sql0="select * from user_login where id='$iid' ";
        $req0=mysqli_query($con,$sql0);
        $row = mysqli_num_rows($req0); 
            $arr0=mysqli_fetch_assoc($req0);
             $user=$arr0['id'];?>

            <div class="container text-center" style="margin-left: 40%;">
      <div class="row text-center">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-10  " style="margin-top:10px;width: 200px;">
            <img class="card-img-top" src="upload/images.png" alt="" style="height: 140px; width: auto;">
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
    </div>
      <!-- /.row -->

  <div class="text-center" style="width: 30%;margin-left: 35%;">
  <form class="form-signin" action="" method="post">
      <img class="mb-4" src="" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">1 Stape More..</h1>
      <label for="inputEmail" >*Enter A New Password</label>
      <label for="psw" style="font-size:11px; padding: 0px; margin: 0px;top: 1px;color: red;">*Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</label>
      <input type="text" id="inputpassword" name="search" class="form-control" placeholder="Enter The Password" required="" autofocus="" style="margin-bottom: 2%;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" style="background-color: #6AA184FF" >Change Password</button>
    </form>
    </div>
    <?php
  if(isset($_POST['submit'])){
           $search=$_POST['search'];

           //header('location:searchpass.php?id='.$search);

             $sql_pass="update user_login set password='$search' where id=$iid ";
        $req_pass=mysqli_query($con,$sql_pass);
        echo "<script>alert('your password has been updated');</script>";
        header('location:logout.php'); 
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
         
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