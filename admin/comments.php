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
	$query="select * from  comments ORDER BY id DESC";
	$req=mysqli_query($con,$query);

  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idd = $_REQUEST['id'];
    $id = base64_decode($idd);
    
    $sql = "delete from comments where id='$id'";
    mysqli_query($con,$sql);
    
      header("location:comments.php");
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
		</style>
	</head>
	<body  class="bd">
		<div class="view" >
			<h3><a href="userdash.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Blog Comments From  User</h3>

			<form action="" method="post">
            <div class="input-group" style="width: 50%;margin-top: 2%;margin-left: 22%;padding-bottom: 0px;margin-bottom: 0px;">
              <input type="text" name="search" class="form-control" placeholder="Search for..." style="width: 50%;">
              <span class="input-group-btn" style="padding-top: 8px;">
                <button class="btn btn-secondary " type="submit" name="submit">Go!</button>
              </span>
            </div>
            </form>

            <?php if(isset($_POST['submit'])){
           $search=$_POST['search'];
           header('location:comments.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from comments where (comenter like '%" . str_replace( ' ', '%\' AND comenter LIKE \'%', $getresult ) . '%\') 
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')
         OR (blog_id=' ."'". str_replace( ' ', '\' AND blog_id='."'", $getresult ) ."'".')  
         OR (comments like' ."'".'%'. str_replace( ' ', '%\' AND comments LIKE \'%', $getresult ) . '%\')
         OR (mail_id like' ."'".'%'. str_replace( ' ', '%\' AND mail_id LIKE \'%', $getresult ) . '%\')
         OR (time like' ."'".'%'. str_replace( ' ', '%\' AND time LIKE \'%', $getresult ) . '%\')
         OR (u_id like' ."'".'%'. str_replace( ' ', '%\' AND u_id LIKE \'%', $getresult ) . '%\')
         OR (which_bloger like' ."'".'%'. str_replace( ' ', '%\' AND which_bloger LIKE \'%', $getresult ) . '%\')
         OR (ip like' ."'".'%'. str_replace( ' ', '%\' AND ip LIKE \'%', $getresult ) . '%\')';

   // echo $sql_profile="select * from user_login where country LIKE '%$getresult%'";
        $req_profile=mysqli_query($con,$sql_profile);
         $row_profile= mysqli_num_rows($req_profile);
         

         if ($row_profile==0) {?>
           <p class="lead text-muted text-center"  style="font-weight: bolder;color: red;">Result Not Found ! Please Try Again</p>
         
        <?php } }?>
        <?php  
      if(!empty($getresult)){?>
      <!-- admin table view  start here -->
			<table id="customers">
    <tr>
      <th>ID No.</th>
      <th>logo</th>
      <th>comenter</th>
      <th>comments</th>
      <th>time</th>
      <th> blog_id</th>
      <th>mail_id</th>
      <th>commenter-id</th>
      <th>bloger-id</th>
      <th>ip</th>
      <th>Action</th>
    </tr>
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['id'];
            $ird=$arr_profile['u_id']; 
          $ird1=$arr_profile['which_bloger']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);

        $sq111="select * from user_login where id='$ird1'";
        $re111=mysqli_query($con,$sq111);
        $getdata1=mysqli_fetch_assoc($re111);
          ?>

					<tr>
      <td><?php echo $arr_profile['id']?></td>
      <td><img src="../<?php echo $arr_profile['logo']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $arr_profile['comenter']?></a></td>
      <td><?php echo $arr_profile['comments']?></td>
      <td><?php echo date("y-m-d-H:i:s",$arr_profile['time'])?></td>
      <td><a href="userblog.php?iv=<?php echo $arr_profil['blog_id']?>"><?php echo $arr_profile['blog_id']?></a></td>
      <td><?php echo $arr_profile['mail_id']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $arr_profile['u_id']?></a></td>
      <td><a href="userview.php?iv=<?php echo $getdata1['username']?>"><?php echo $getdata1['name'].'&nbsp'.$getdata1['last_name'].'&nbsp('.$arr_profile['which_bloger'],')'?></td>
        <td><?php echo $arr_profile['ip']?></td>
      <td ><a href="comments.php?action=del&id=<?php echo base64_encode($arr_profile['id'])?>" style="color: red">Delete</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr_profile['blog_id'])?>">view</a></td>
    </tr>
				<!--admin view container end here -->
				<?php }?>
				</table>

            <?php }else{?>
			<!-- admin table view  start here -->
			<div style="overflow-x:auto;">
  <table id="customers">
    <tr>
     <th>ID No.</th>
      <th>logo</th>
      <th>comenter</th>
      <th>comments</th>
      <th>time</th>
      <th> blog_id</th>
      <th>mail_id</th>
      <th>commenter-id</th>
      <th>bloger-id</th>
      <th>ip</th>
      <th>Action</th>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($req)){  
         $ird=$arr['u_id']; 
          $ird1=$arr['which_bloger']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);

        $sq111="select * from user_login where id='$ird1'";
        $re111=mysqli_query($con,$sq111);
        $getdata1=mysqli_fetch_assoc($re111);

      ?>
    <tr>
     <td><?php echo $arr['id']?></td>
      <td><img src="../<?php echo $arr['logo']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $arr['comenter']?></a></td>
      <td><?php echo $arr['comments']?></td>
      <td><?php echo date("y-m-d-H:i:s",$arr['time'])?></td>
      <td><a href="userblog.php?iv=<?php echo $arr['blog_id']?>"><?php echo $arr['blog_id']?></a></td>
      <td><?php echo $arr['mail_id']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $arr['u_id']?></td>

      <td><a href="userview.php?iv=<?php echo $getdata1['username']?>"><?php echo $getdata1['name'].'&nbsp'.$getdata1['last_name'].'&nbsp('.$arr['which_bloger'].')'?></a></td>
      <td><?php echo $arr['ip']?></td>
      <td ><a href="comments.php?action=del&id=<?php echo base64_encode($arr['id'])?>" style="color: red">Delete</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr['blog_id'])?>">view</a></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
</div>
</body>
</html>
			