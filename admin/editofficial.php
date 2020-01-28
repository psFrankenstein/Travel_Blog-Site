<?php

require('core.php');
require('connection.php');
require('slice/header.php');
require('slice/sidebar.php');
require('slice/footer.php');
if(!isset($_SESSION['id']))
{
	header("location:index.php");
	
}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<style type="text/css">
			
			.table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.imtd:hover{
overflow:all;
box-sizing: border-box;
border-radius: 0px;
transition: transform .6s;
-webkit-transform: scale(1.2);
transform: scale(5.2);
box-shadow:

1px 1px 1px 1px #6f6f6f;

}
		</style>
	</head>
	<body  class="bd">
		<div class="view" >
      <div class="form-group">
			<h3><a href="dashboard.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Blog From Register User</h3>
      <?php 
   $query="select * from  user_login where id='11' ";
  $req=mysqli_query($con,$query);
  $arrpro=mysqli_fetch_assoc($req);

  if(isset($_REQUEST['butt']))
  { 
        
    $name= $_REQUEST['name'];
   // $last_name= $_REQUEST['last_name'];
    $work= $_REQUEST['work'];
    $email= $_REQUEST['email'];
    $country= $_REQUEST['country'];
    $b_date = $_REQUEST['b_date'];
    $b_day = $_REQUEST['b_day'];
    $b_year = $_REQUEST['b_year'];
    $contact = $_REQUEST['contact'];

    if($_FILES['photo']['name']!="")
  {
  $photo_name= time().$_FILES['photo']['name'];
  $tmp= $_FILES['photo']['tmp_name'];

 // $des=getcwd('traveler')."/upload";;
   $dest='upload/'.basename($photo_name); 
  if(move_uploaded_file($tmp, "../upload/".basename($photo_name)))
  {
  

    echo $sql = "update user_login set name='$name',work='$work',country='$country',b_date='$b_date',b_day='$b_day',b_year='$b_year',contact='$contact' ,email='$email',p_photo='$dest' where id='11'";
  mysqli_query($con,$sql);
  
  header("location:editofficial.php");
  }

  }
  else{
     echo $sql = "update user_login set name='$name',work='$work',country='$country',b_date='$b_date',b_day='$b_day',b_year='$b_year',contact='$contact' ,email='$email' where id=11";
  mysqli_query($con,$sql);
   header("location:editofficial.php");
  }

 }
  
  
  ?>

  <form  action="" method="post" enctype="multipart/form-data">
         <div class="form-group">
          <label for="uname"><b>Photo</b></label>
          <input type="file" class="form-control-row" name="photo" accept="image/*" style=" max-width: 100%; max-height: 100%;"><img src="../<?php echo $arrpro['p_photo']?>" style=" max-width: 200px; max-height: 200px;" /></div>
          <div class="form-group">
      <label for="uname"><b>Enter Name</b></label>
      <input  class="form-control" placeholder="Enter Name" name="name" id="name"  required value="<?php echo $arrpro['name'] ?>" ></div>
 <div class="form-group">
      <label for="uname"><b>Enter Last Name</b></label>
      <input  class="form-control" placeholder="Enter last Name" name="last_name" id="namel"  value="<?php echo $arrpro['last_name'] ?>" disabled="disabled" ></div>
 <div class="form-group">
      <label for="uname"><b>Enter work</b></label>
      <input type="text" class="form-control" placeholder="Enter work" name="work" id="work" value="<?php echo $arrpro['work'] ?>"></div>
 <div class="form-group">
      <label for="uname"><b>Enter country</b></label>
      <input type="text" class="form-control" placeholder="Enter country" name="country" id="country" size="50" placeholder="Enter a location" autocomplete="on" value="<?php echo $arrpro['country']?>"></div>
 <div class="form-group">
      <label for="uname"><b>Enter birth date</b></label><br>
      <input type="number" class="form-control" placeholder="date" name="b_date" id="b_date" min="1" max="31" style="width: 20%; text-align: center;" value="<?php echo $arrpro['b_date'] ?>">

      <input type="number" class="form-control" placeholder="month" name="b_day" id="b_day" min="1" max="12" style="width: 20%; text-align: center;" value="<?php echo $arrpro['b_day'] ?>">

      <input type="number" class="form-control" placeholder="year" name="b_year" id="b_year" min="<?php echo date("Y")-90; ?>" max="<?php echo date("Y"); ?>" style="width: 20%; text-align: center;" value="<?php echo $arrpro['b_year'] ?>" > &nbsp&nbsp&nbsp<abbr title="the month of February has 28 days in common years and 29 days in leap years">?</abbr></div><br><br>
       <div class="form-group">
      <label for="uname"><b>Enter email</b></label>
      <input type="text" class="form-control" placeholder="Enter E-mail" name="email" id="email" value="<?php echo $arrpro['email'] ?>" pattern="[a-z0-9._%+-]+@gmail+\.[a-z]{2,63}$"></div><br><br>
 <div class="form-group">
      <label for="uname"><b>Enter contact</b></label>
      <input type="text" class="form-control" placeholder="Enter contact (e-mail/phone)" name="contact" id="contact" value="<?php echo $arrpro['contact'] ?>"></div>

        
      <button type="submit" name="butt">save</button>
    </form>
</div>
</div>
</body>
</html>
			