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
  <?php require('slice/header.php');
  $blog_id = $_REQUEST['id'];
  $blog_idget = $_REQUEST['id'];
  $id= base64_decode($blog_id);
  //set delete algo 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    $idcomt="select * from comments where id='$ied'";
    $qurescom= mysqli_query($con,$idcomt);
    $arrcom=mysqli_fetch_assoc($qurescom);
         $com_log_id=base64_encode($arrcom['blog_id']);
    $sql001 = "delete from comments where id='$ied'";
    $qures= mysqli_query($con,$sql001);
    
     header("location:read.php?id=".$com_log_id.'#comment');
  } 

   //set seen post algo
     // $usee=$arrseen['blog_id'];
        $usession=$_SESSION['id']['id'];
        $querseen="select * from view where post_id= '$id' AND user_id='$usession'  ";
        $reqseen=mysqli_query($con,$querseen);
         $arrseen=mysqli_num_rows($reqseen);
    if ($arrseen===0) { //set condition for session bloger
     
         $querseen1="insert into  view (user_id,post_id) values ('$usession','$id')";
                  mysqli_query($con,$querseen1);
    }
    if(!isset($_SESSION['id'])){
      $querseen1="insert into  view (post_id) values ('$id')";
                  mysqli_query($con,$querseen1);
    }
    $querseen2="select * from view where post_id= '$id' AND user_id!='NULL'";
        $reqseen2=mysqli_query($con,$querseen2);
        $arrseen2=mysqli_num_rows($reqseen2);
        $querseen3="select * from view where post_id= '$id' AND user_id='NULL'";
        $reqseen3=mysqli_query($con,$querseen3);
        $arrseen3=mysqli_num_rows($reqseen3);
  //fetch blog post info
  
  $sql1="select * from user_post where id=$id";
  $req1=mysqli_query($con,$sql1);
  $arr1=mysqli_fetch_assoc($req1);
  $delpo=mysqli_num_rows($req1);
  //=================================================================

  $blog_id=$arr1['blog_id'];
  $ouocommener=$arr1['u_id'];
  $usee=$arr1['blog_id'];
  //fetch login info
  $sql2="select * from user_login where id=$blog_id";
  $req2=mysqli_query($con,$sql2);
  $arr2=mysqli_fetch_assoc($req2);
    $pid=$arr2['id'];

     $sqlresultre="select * from report where post_id='$id'";
                  $quryresultre=mysqli_query($con,$sqlresultre);
                  $rowresultre=mysqli_num_rows($quryresultre);
                 if ($rowresultre>10 || $delpo==0) {
            echo '<section class="jumbotron text-center" style="height: 200px;padding-top: 0px;margin-top: 1%;background-color: #FF000023;">
        <div class="container" style="height: 100px;">
          <h1 class="jumbotron-heading">This Attachment is not valid</h1>
          <p class="lead text-muted">This is post may be Blocked or deleted by user or website admin </p></div>
      </section>';
            die();
                 }

  ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
        <!-- Title -->
        <h1 class="mt-4"><?php echo $arr1['blog_head']?></h1>
        <!-- Author -->
        <p class="lead" >
          by
          <a href="<?php if ($blog_id==$usession) {?>profile.php<?php }else{?>ucbloger.php<?php }?>?id=<?php echo base64_encode($arr2['id'])?>"><?php echo $arr2['name'].'&nbsp'.$arr2['last_name']?></a>
        </p>
        <hr>
        <!-- Date/Time -->
        <h6 style="padding-left: 60%;">Posted on <?php echo $arr1['time']?></h6>
        <hr>
        <!-- Preview Image -->
        <div oncontextmenu="return false;">
        <?php if(!empty($arr1['photos1'])){?>
        <a <?php if(isset($_SESSION['id'])){?> href="post/<?php echo $arr1['photos1']?>" target="_blank" <?php }?>><img class="img-fluid rounded" src="post/<?php echo $arr1['photos1']?>" alt=""  style="cursor: pointer;height: 300px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos2'])){?>
        <a <?php if(isset($_SESSION['id'])){?> href="post/<?php echo $arr1['photos2']?>" target="_blank" <?php }?>><img class="img-fluid rounded" src="post/<?php echo $arr1['photos2']?>" alt="" style="cursor: pointer;height: 300px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos3'])){?>
        <a <?php if(isset($_SESSION['id'])){?> href="post/<?php echo $arr1['photos3']?>" target="_blank" <?php }?>><img class="img-fluid rounded" src="post/<?php echo $arr1['photos3']?>" alt="" style="cursor: pointer;height: 300px;"></a>
        <?php }?>
        <?php if(!empty($arr1['photos4'])){?>
        <a <?php if(isset($_SESSION['id'])){?> href="post/<?php echo $arr1['photos4']?>" target="_blank" <?php }?>><img class="img-fluid rounded" src="post/<?php echo $arr1['photos4']?>" alt="" style="cursor: pointer;height: 300px;"></a>
        <?php }?>
        </div>
        <hr>
        <!-- Post Content -->
        <p><?php echo $arr1['blog_body']?></p>
        <hr style="padding: 0px;margin: 1px;">
        
          <div class="venom-container venom-white" id="notblok">

            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom">
                 <?php 
                 if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
                 $sqllike = "select id from likes where user_id='$usession' and post_id='$id' "; //get like data from database

                 $reslike = mysqli_query($con,$sqllike); //run query

                  $rowlike = mysqli_num_rows($reslike); //fatch row 
                  if ($rowlike===0) {
                 
                if ( isset($_POST['likeuser'])) {
                  $time = time();
                  $sqllikeget="insert into likes (user_id,post_id,created_time,which_blog) values ('$usession','$id','$time','$usee')"; //upload like 
                   mysqli_query($con,$sqllikeget);

                   header("location:read.php?id=".$blog_idget.'#notblok');
                   }
                 ?>
                 
              <form action="" method="post">
              <button type="submit" name="likeuser" style="width: 70px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/like.png" style="height: 22px;padding-bottom: 3px;">like</button>
            </form>
              <?php } else if ($rowlike===1) {
                 
                if ( isset($_POST['likeuser'])) {
                  $sqlliked="delete from likes where user_id='$usession' AND post_id='$id'";
                   mysqli_query($con,$sqlliked);

                   header("location:read.php?id=".$blog_idget.'#notblok');
                   }
                 ?>
              <form action="" method="post">
              <button type="submit" name="likeuser" style="width: 90px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/liked.png" style="height: 22px;padding-bottom: 3px;">liked</button>
            </form>

           <?php }  }//end of session count
                    else{?>
              <abbr title="you can't
              "><button  name="likeuser" style="width: 70px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/liked.png" style="height: 22px;padding-bottom: 3px;">like</button></abbr>
               <?php }  ?>
          </span><?php 
             $sqllike1 = "select id from likes where  post_id='$id' "; //get like data from database

                 $reslike1 = mysqli_query($con,$sqllike1); //run query

                  $rowlike1 = mysqli_num_rows($reslike1); //fatch row
          echo $rowlike1;

            $sql32="select * from comments where blog_id=$id";
  $req32=mysqli_query($con,$sql32);
  //$arr32=mysqli_fetch_assoc($req32);
     $row32 = mysqli_num_rows($req32)?><!--form to creat like unlike formet-->

            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;"><abbr title="Seen By"><img class="rounded-circle" src="photos/seen.png" alt="" style="height: 15px;width:auto;"></abbr> <?php echo $arrseen2;?></span>
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 2%;"><abbr title="Anonymous Seen By"><img class="rounded-circle" src="photos/an.png" alt="" style="height: 20px;width:auto;"></abbr> <?php echo $arrseen3;?></span> <!--form to see post is seen by people-->
            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 4%;"><abbr title="comment By"><img class="rounded-circle" src="photos/comment.png" alt="" style="height: 20px;width:auto;"></abbr> <?php echo $row32;?></span>

            <span class="venom-tag venom-light-grey venom-small venom-margin-bottom" style="margin-left: 5%;">
                 <?php 
                 if(isset($_SESSION['id']) && !empty($_SESSION['id']) && $_SESSION['id']['id']!=$pid){
                  $sqlresult="select * from report where who='$usession' AND post_id='$id'";
                  $quryresult=mysqli_query($con,$sqlresult);
                  $rowresult=mysqli_num_rows($quryresult);
                  $timerepo=time();
                  if ($rowresult===0) {
                 
                if ( isset($_POST['seenuser'])) {
                  $sqlreport="insert into report(user_id,post_id,who,time) values('$usee','$id','$usession','$timerepo')";
                   mysqli_query($con,$sqlreport);

                   header("location:read.php?id=".$blog_idget.'#notblok');
                   }
                 ?>
              <form action="" method="post">
              <button type="submit" name="seenuser" style="width: 110px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/repo.png" style="height: 9px;padding-bottom: 3px;">Report Abuse</button>
            </form>
              <?php } else if ($rowresult===1) {
                 
                if ( isset($_POST['seenuser'])) {
                  $sqlreport="delete from report where who='$usession' AND post_id='$id'";
                   mysqli_query($con,$sqlreport);

                  header("location:read.php?id=".$blog_idget.'#notblok');
                   }
                 ?>
              <form action="" method="post">
              <button type="submit" name="seenuser" style="width: 90px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/repo.png" style="height: 9px;padding-bottom: 3px;">Reported</button>
            </form>

           <?php }  }//end of session count
                    else{?>
              <abbr title="you can't report
              "><button  name="seenuser" style="width: 110px;height: 25px;padding: 0px;margin: 0px;background-color: #FF000045;color: black;"><img src="photos/repo.png" style="height: 9px;padding-bottom: 3px;">Report Abuse</button></abbr>
               <?php }
               $sqlresult="select * from report where post_id='$id'";
                  $quryresult=mysqli_query($con,$sqlresult);
                  $rowresult=mysqli_num_rows($quryresult);
                 $sessioni=$_SESSION['id']['id'];
                 if($sessioni==$pid){echo $rowresult;}
               ?>
          </span> <!--form to creat report formet-->
          </div>




          <hr style="padding: 0px;margin: 0px;">
        <div> 
          <span style="margin-left:69%;">share in <a href="http://www.facebook.com/sharer.php?u=traveler.com/read.php?id=<?php echo $blog_idget;?>"><abbr title="share in facebook"><img class="rounded-circle" src="photos/facebook.png" alt=""></abbr></a>
          <a href="http://twitter.com/share?text=travler.com/read.php?id=<?php echo $blog_idget;?>"><abbr title="share in twitter"><img class="rounded-circle" src="photos/twitter.png" alt=""></abbr></a>
          <a href="whatsapp://send?text=traveler.com/read.php?id=<?php echo $blog_idget;?>"><abbr title="share in whatsapp"><img class="rounded-circle" src="photos/whatsapp.png" alt="" style="width: 50px;"></abbr></a> </span>
        </div>
        <hr style="padding: 0px;margin: 0px;">
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <?php 
              $ip=$_SERVER['REMOTE_ADDR'];
            if(isset($_REQUEST['subb1'])) {
            $comenter= $_REQUEST['comenter'];
            $finalcomenter=str_replace('<', ' ',$comenter);
            $comments= $_REQUEST['comments'];
            $finalcoments=str_replace('<', ' ',$comments);
            $mail_id= $_REQUEST['mail_id'];
            $id1 = $_REQUEST["id"];
            $timerepo=time();
            $sqll = "insert into comments(comenter,comments,mail_id,blog_id,time,which_bloger,ip) values('$finalcomenter','$finalcoments','$mail_id','$id','$timerepo','$usee','$ip')";
            mysqli_query($con,$sqll);
            header("location:read.php?id=".$id1.'#comment');
            }
            ?>
            <?php if(!isset($_SESSION['id']))
            {
            ?>
            <form accept="" method="post">
              <div class="form-group">
                <input type="text" name="comenter" placeholder="enter your name" pattern="[a-zA-Z0-9]+" required >
              </div>
              <div class="form-group">
                <input type="email" name="mail_id" placeholder="enter your E-mail" style=" width: 100%; height:50px;" pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,63}$" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="comments" rows="3" placeholder='enter a comment' style=" width: 100%; height:150px;resize: none;" required></textarea>
              </div>
              <button type="submit" name='subb1' class="btn btn-primary">Submit</button>
            </form>
            <?php   } else{?>
            <form accept="" method="post">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="adcom" placeholder='enter a comment' style=" width: 100%; height:150px;resize: none;" required></textarea>
              </div>
              <button type="submit" name="subb2" class="btn btn-primary">Submit</button>
            </form>
            <?php }?>
            <?php
            if ($blog_id==$usession) {
              $comente='<font style="color:green;">'.$_SESSION["id"]["name"]."&nbsp".$_SESSION["id"]["last_name"].'*</font>';
            }else{
            $comente='<font style="color:blue;">'.$_SESSION["id"]["name"]."&nbsp".$_SESSION["id"]["last_name"].'</font>';}
            $mail=$_SESSION['id']['email'];
            $iidd=$_SESSION['id']['id'];
            $com_logo=$_SESSION['id']['p_photo'];
            if(isset($_REQUEST['subb2'])) {
            $comment= $_REQUEST['adcom'];
             $finalcoments=str_replace('<', ' ',$comment);
            $id1 = $_REQUEST["id"];
            $timerepo=time();
            $sqll1 = "insert into comments(comenter,comments,mail_id,blog_id,logo,u_id,time,which_bloger,ip) values('$comente','$finalcoments','$mail','$id','$com_logo','$iidd','$timerepo','$usee','$ip')";
            $qury1=mysqli_query($con,$sqll1);
            header("location:read.php?id=".$id1.'#comment');
            } ?>
          </div>
        </div>
        <!-- Single Comment -->
        <p class="text-center lead text-muted">Comments</p>
        <?php  $sql0="select * from comments where blog_id=$id";
        $req0=mysqli_query($con,$sql0);
        while( $arr0=mysqli_fetch_assoc($req0)){ 
        $delid=$arr0['id'];
        $comuser=$arr0['u_id'];
        $sessid=$_SESSION['id']['id']; ?>
        <div class="media mb-3" id="comment" style="background-color: #0600FF10">
          <img class="d-flex mr-3 rounded-circle" src="<?php echo $arr0['logo']?>" alt="" style="width:50px;height: 50px;" >
          <div class="media-body">

            <h6 class="mt-0" style="margin: 0px;padding: 0px;"><a href="<?php if ($comuser==$usession) {?>profile.php<?php }else{?>ucbloger.php<?php }?>?id=<?php echo base64_encode($arr0['u_id']) ?>"><?php echo $arr0['comenter']?></a>
             &nbsp <?php if (isset($_SESSION['id'])) {
            if ($blog_id==$usession) {?><a href="read.php?action=del&id=<?php echo base64_encode($arr0['id'])?>"><font style="margin: 0px;padding: 0px;font-size: 10px;color: red;">Delete</font></a><?php }
              else if ($blog_id!=$usession && $comuser==$sessid) {?><a href="read.php?action=del&id=<?php echo base64_encode($arr0['id'])?>"><font style="margin: 0px;padding: 0px;font-size: 10px;color: red;">Delete</font></a><?php }}//delete option creation for comment?>

              <div class="text-right lead text-muted" style="margin: 0px;padding: 0px;font-size: 10px;"><?php echo date("y-m-d~H:i:s",$arr0['time'])?></div></h6>
            <h8 style="margin: 0px;padding: 0px;padding-bottom: 2px;"><?php echo $arr0['comments']?></h8>
          </div>
        </div>
        <?php }?>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <form action="" method="post">
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search for...">
              <span class="input-group-btn" style="padding-top: 8px;">
                <button class="btn btn-secondary" type="submit" name="submit">Go!</button>
              </span>
            </div>
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
        </div>
        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">More post by <?php echo $arr2['name']?></h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg">
                <ul class="list-styled" style="list-style-type: circle;">
                  <?php 
         $blog_id = $_REQUEST['id'];
          $id= base64_decode($blog_id);
  
       $sql1="select * from user_post where blog_id='$pid'  ORDER BY RAND() limit 8";
       $req1=mysqli_query($con,$sql1);
                  while($arr1=mysqli_fetch_assoc($req1)){?>
                  <li style="">
                    <a href="read.php?id=<?php echo base64_encode($arr1['id']) ?>">
                      <?php if(!empty($arr1['photos1'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $arr1['photos1']?>" alt="" onclick="myFunction(this);" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($arr1['photos2'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $arr1['photos2']?>" alt="" onclick="myFunction(this);" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($arr1['photos3'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $arr1['photos3']?>" alt="" onclick="myFunction(this);" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }
         else if(!empty($arr1['photos4'])){?>
        <img class="img-fluid rounded" src="post/<?php echo $arr1['photos4']?>" alt="" onclick="myFunction(this);" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
        <?php }?><?php echo $arr1['blog_head']?></a>
                  </li>
                  <?php }?> 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Bloger's Profile</h5>
          <div class="card-body">
            <ul class="list-styled" style="list-style-type: circle;">
                  <?php 
  
       $sqlq="select * from user_login ORDER BY RAND() limit 5";
       $reqq=mysqli_query($con,$sqlq);
                  while($arrq=mysqli_fetch_assoc($reqq)){?>
                  <li style="">
                    <a href="ucbloger.php?id=<?php echo base64_encode($arrq['id']) ?>">
        
        <img class="img-fluid rounded" src="<?php echo $arrq['p_photo']?>" alt="" onclick="myFunction(this);" style="height: 40px;width: 40px;border-radius:10%;margin-bottom: 5px;">
                          <?php echo $arrq['name'].'&nbsp'.$arrq['last_name']?></a>
                  </li>
                  <?php }?> 
                </ul>
          </div>
          <p class="text-center text-muted">&copy Travel Blog <?php echo date("Y");?> </p>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Footer -->
  <?php require('slice/footer.php'); ?>
  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  
</body></html>