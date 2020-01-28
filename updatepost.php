<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
?>
<?php 
if(!isset($_SESSION['id']))
{
  header("location:index.php");
  
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
.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}
.venom-quarter {
  position: relative;
}

.image {
  display: block;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(255, 0, 0, 0.34); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: black;
  font-weight: bolder;
  font-size: 25px;
  padding: 5px;
  text-align: center;
  height: 40px;
}

.venom-quarter:hover .overlay {
  opacity: 1;}
  </style>
</head>
<body >
  <?php require('slice/header.php');?>

     <?php   
               $id_user = $_REQUEST['id'];
     $getresult=base64_decode($_REQUEST['id']) ;
                $up_id= $getresult; 

                 

               if (empty($getresult)) {
                  header('location:profile.php');
                } 

             if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos1='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updatepost.php?id=".$id_user);
  } 
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del1")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos2='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updatepost.php?id=".$id_user);
  } 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="del2")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos3='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updatepost.php?id=".$id_user);
  }
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del3")
  {
    $idcard = $_REQUEST['id'];
    $ied = base64_decode($idcard);
    
    $sql = "update user_post set photos4='' where id='$ied'";
    mysqli_query($con,$sql);
    
      header("location:updatepost.php?id=".$id_user);
  }
  ?>

          <div class="contener">
  <!--  post update model /edit drop down colaps -->
  <?php


    if(isset($_REQUEST['post1']))
  {


        $confirm="select * from user_post where  id='$up_id'";
   $confirmquery=mysqli_query($con,$confirm);
   $confirmresult=mysqli_fetch_assoc($confirmquery);
      $confirmblog=$confirmresult['blog_body'];
       $confirmhead=$confirmresult['blog_head'];
       $confirmdtl=$confirmresult['blog_dtl'];
    //$ied = base64_decode($idcard);
        
   $blog_head= $_REQUEST['blog_head'];
  $blog_dtl= $_REQUEST['blog_dtl'];
    $blog_body= $_REQUEST['blog_body'];


    $photo1="";
    $photo2="";
    $photo3="";
    $photo4="";

    if($_FILES['photos1']['name']!="")
    {

      $name = time().$_FILES['photos1']['name'];
      $dest = "post/".$name;   
      move_uploaded_file($_FILES['photos1']['tmp_name'], $dest) ;
       $photo1 =",photos1='$name'";

    }
    if($_FILES['photos2']['name']!="")
    {

      $name1 = time().$_FILES['photos2']['name'];
      $dest= "post/".$name1;   
      move_uploaded_file($_FILES['photos2']['tmp_name'], $dest) ;
       $photo2=",photos2='$name1'";

    }
    if($_FILES['photos3']['name']!="")
    {

      $name2 = time().$_FILES['photos3']['name'];
      $dest = "post/".$name2;   
      move_uploaded_file($_FILES['photos3']['tmp_name'], $dest) ;
       $photo3=",photos3='$name2'";

    }
    if($_FILES['photos4']['name']!="")
    {

      $name3 = time().$_FILES['photos4']['name'];
      $dest = "post/".$name3;   
      move_uploaded_file($_FILES['photos4']['tmp_name'], $dest) ;
       $photo4=",photos4='$name3'";

    }

    $sql = "update user_post set 
    blog_head='$blog_head',blog_dtl='$blog_dtl',blog_body='$blog_body' ".$photo1." ".$photo2." ".$photo3." ".$photo4."  where id='$up_id'";
  mysqli_query($con,$sql);
  ////to confirm update 
       if ($confirmblog!=$blog_body || $confirmhead!=$blog_head ||$confirmdtl!=$blog_dtl) {
   $sqlrepodel = "delete from report where  post_id='$up_id'";
    mysqli_query($con,$sqlrepodel);
  }

  header("location:profile.php#".$up_id);
  
   } 
  ?>
  <div class="venom-col m7" style="margin-left: 10%;width: 75%; margin-top:12px;">
    
      <div class="venom-row-padding">
        <div class="venom-col m12">
          <div class="venom-card venom-round venom-white">
            <div class="venom-container venom-padding">
              <h6 class="venom-opacity text-muted text-center">Update blog post</h6>
  <form action="" method="post" enctype="multipart/form-data" id="update" >
    <?php 
    $sql1="select * from user_post where id=$up_id";
      $req1=mysqli_query($con,$sql1);
      $arr1=mysqli_fetch_assoc($req1) ;
    ?>
    <div class="venom-row-padding" style="margin:0 -6px">
            <?php 
            if(!empty($arr1['photos1'])){?>
            <div class="venom-quarter">
              <img src="post/<?php echo $arr1['photos1']?>" style="width:100%;height:200px;padding-right: 0px; " class="venom-margin-bottom" alt="">
              <a href="updatepost.php?action=del&id=<?php echo base64_encode($arr1['id'])?>"><div class="overlay text-center">DELETE</div>
            </div></a>
            <?php  }?>
            <?php if(!empty($arr1['photos2'])){?>
            <div class="venom-quarter">
              <img src="post/<?php echo $arr1['photos2']?>" style="width:100%;height:200px;padding: 0px;" class="venom-margin-bottom" alt="">
              <a href="updatepost.php?action=del1&id=<?php echo base64_encode($arr1['id'])?>"><div class="overlay text-center">DELETE</div>
          </div></a>
          <?php  }?>
            <?php if(!empty($arr1['photos3'])){?>
          <div class="venom-quarter">
              <img src="post/<?php echo $arr1['photos3']?>" style="width:100%;height:200px;" class="venom-margin-bottom" alt="">
              <a href="updatepost.php?action=del2&id=<?php echo base64_encode($arr1['id'])?>"><div class="overlay text-center">DELETE</div>
          </div></a>
          <?php }?>
            <?php if(!empty($arr1['photos4'])){?>
          <div class="venom-quarter">
              <img src="post/<?php echo $arr1['photos4']?>" style="width:100%;height:200px;" class="venom-margin-bottom" alt="">
              <a href="updatepost.php?action=del3&id=<?php echo base64_encode($arr1['id'])?>"><div class="overlay text-center">DELETE</div>
          </div></a>
          <?php }?>
        </div>
     <h9>Upload Photo:<font color="red">(max 2 mb)</font></h9><br>
     <?php 
            if(empty($arr1['photos1'])){?>
     <input type="file" class="form-control-row" name="photos1" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser" onchange="return ValidateFileUpload()"><?php }
            if(empty($arr1['photos2'])){?>
     <input type="file" class="form-control-row" name="photos2" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser1" onchange="return ValidateFileUpload1()"><?php }
            if(empty($arr1['photos3'])){?>
     <input type="file" class="form-control-row" name="photos3" accept="image/*" style=" max-width: 100%; max-height: 100%;" id="fileChooser2" onchange="return ValidateFileUpload2()" ><?php }
            if(empty($arr1['photos4'])){?>
     <input type="file" class="form-control-row" name="photos4" accept="image/*" style=" max-width: 100%; max-height: 100%; margin-bottom: 2%;" id="fileChooser3" onchange="return ValidateFileUpload3()" ><?php }?><br>
     <img src="images/noimg.jpg" id="blah"  style="height: 60px;width: auto; margin-left: 5%;" alt="">
     <img src="images/noimg.jpg" id="blah1" style="height: 60px;width: auto;margin-left: 2%;" alt="">
     <img src="images/noimg.jpg" id="blah2" style="height: 60px;width: auto;margin-left: 2%;" alt="">
     <img src="images/noimg.jpg" id="blah3" style="height: 60px;width: auto;margin-left: 2%;" alt=""><hr>
     Blog Heading:
     <input type="text" name="blog_head" maxlength="255" style=" width: 100%; height:30px;margin: 0px;" placeholder="heading maxlength 255" value="<?php echo $arr1['blog_head']?>"  /><br>
              short Summary :
              <textarea contenteditable="true" name="blog_dtl" class="venom-border venom-padding"  maxlength="500" placeholder="Blog short detail under 500" style=" width: 100%; height:60px;resize: none;"  ><?php echo $arr1['blog_dtl']?></textarea><br>

              Blog:  
              <textarea contenteditable="true" name="blog_body" class="venom-border venom-padding" placeholder="Status: Feeling Blue" style=" width: 100%; height:130px;resize: none;"><?php echo $arr1['blog_body']?></textarea>
              <button type="submit" class="venom-button venom-theme" name="post1" style="background-color:#91BFE5FF;"><i class=""></i> &nbsp Update</button> 
            </form>

            </div>
          </div>
        </div>
      </div>

       <!--update post  end -->
         
<p class="mt-5 mb-3 text-muted text-center">&copy Travel Blog <?php echo date("Y");?> </p>
  
<!--validation of imge to get verifi-->
<SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                  if (fuData.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
               alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser").value = '';
        return false;

            }
        }
    }

    function ValidateFileUpload1() {
        var fuData1 = document.getElementById('fileChooser1');
        var FileUploadPath1 = fuData1.value;

//To check if user upload any file
        if (FileUploadPath1 == '') {
            alert("Please upload an image");

        } else {
            var Extension1 = FileUploadPath1.substring(
                    FileUploadPath1.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension1 == "gif" || Extension1 == "png" || Extension1 == "bmp"
                    || Extension1 == "jpeg" || Extension1 == "jpg") {

// To Display
                if (fuData1.files && fuData1.files[0]) {
                  if (fuData1.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser1").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah1').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData1.files[0]);
                }

            } 

//The file upload is NOT an image
else {    alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser1").value = '';
        return false;

            }
        }
    }

    function ValidateFileUpload2() {
        var fuData2 = document.getElementById('fileChooser2');
        var FileUploadPath2 = fuData2.value;

//To check if user upload any file
        if (FileUploadPath2 == '') {
            alert("Please upload an image");

        } else {
            var Extension2 = FileUploadPath2.substring(
                    FileUploadPath2.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension2 == "gif" || Extension2 == "png" || Extension2 == "bmp"
                    || Extension2 == "jpeg" || Extension2 == "jpg") {

// To Display
                if (fuData2.files && fuData2.files[0]) {
                  if (fuData2.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser2").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData2.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser2").value = '';
        return false;

            }
        }
    }

    function ValidateFileUpload3() {
        var fuData3 = document.getElementById('fileChooser3');
        var FileUploadPath3 = fuData3.value;

//To check if user upload any file
        if (FileUploadPath3 == '') {
            alert("Please upload an image");

        } else {
            var Extension3 = FileUploadPath3.substring(
                    FileUploadPath3.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension3 == "gif" || Extension3 == "png" || Extension3 == "bmp"
                    || Extension3 == "jpeg" || Extension3 == "jpg") {

// To Display
                if (fuData3.files && fuData3.files[0]) {
                  if (fuData3.files[0].size > 2048000) {
        alert('Max Upload size is 2MB only');
        document.getElementById("fileChooser3").value = '';
        return false;}
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData3.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.Please select a valid image file ");
        document.getElementById("fileChooser3").value = '';
        return false;

            }
        }
    }
</SCRIPT>
<!--END OF IMG VALIDATION-->
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