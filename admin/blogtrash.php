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
	$query="select * from  del_blog ORDER BY id DESC";
	$req=mysqli_query($con,$query);
	
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
	{
		$idd = $_REQUEST['id'];
		$id = base64_decode($idd);
		
		$sql = "delete from del_blog where id='$id'";
		mysqli_query($con,$sql);
		
			header("location:userblog.php");
	}
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="repo")
  {
    $iddk = $_REQUEST['i'];
    $idk = base64_decode($iddk);
    $query="select * from  del_blog where id='$idk'";
      $req=mysqli_query($con,$query);
      $getadmd=mysqli_fetch_assoc($req);
      $us=$getadmd['blog_id'];
      $getblo=$getadmd['post_id'];
          $timerepo=time();
    echo $sqlreport="insert into report(user_id,post_id,who,time,admin) values('$us','$idk','0','$timerepo','YES')";
                   mysqli_query($con,$sqlreport);
    
      header("location:report.php");
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
			<h3><a href="trash.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Blog From Register User</h3>

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
           header('location:userblog.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from del_blog where (blog_head like '%" . str_replace( ' ', '%\' AND blog_head LIKE \'%', $getresult ) . '%\') 
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')
         OR (blog_id=' ."'". str_replace( ' ', '\' AND blog_id='."'", $getresult ) ."'".')  
         OR (blog_dtl like' ."'".'%'. str_replace( ' ', '%\' AND blog_dtl LIKE \'%', $getresult ) . '%\')
         OR (blog_body like' ."'".'%'. str_replace( ' ', '%\' AND blog_body LIKE \'%', $getresult ) . '%\')
         OR (time like' ."'".'%'. str_replace( ' ', '%\' AND time LIKE \'%', $getresult ) . '%\')
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
      <th>Photo1</th>
      <th>Photo2</th>
      <th>Photo3</th>
      <th>Photo4</th>
      <th>blog by</th>
      <th>blog_head</th>
      <th>blog_dtl</th>
      <th>time</th>
      <th>ip</th>
      <th>Action</th>
    </tr>
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['blog_id']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);
          ?>

					<tr>
      <td><?php echo $arr_profile['id']?></td>
      <td><img class="imtd" src="../post/<?php echo $arr_profile['photos1']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr_profile['photos2']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr_profile['photos3']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr_profile['photos4']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr_profile['blog_id'].')'?></a></td>

      <td><?php echo $arr_profile['blog_head']?></td>
      <td><?php echo $arr_profile['blog_dtl']?></td>
      <td><?php echo $arr_profile['time']?></td>
      <td><?php echo $arr_profile['ip']?></td>
      <td ><a href="blogtrash.php?action=del&id=<?php echo base64_encode($arr_profile['id'])?>" style="color: red">Delete</a><br><a href="blogtrash.php?action=repo&i=<?php echo base64_encode($arr_profile['id'])?>" style="color: #006C06FF">Report</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr_profile['id'])?>">view</a></td>
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
      <th>Photo1</th>
      <th>Photo2</th>
      <th>Photo3</th>
      <th>Photo4</th>
      <th>blog by</th>
      <th>blog_head</th>
      <th>blog_dtl</th>
      <th>time</th>
       <th>ip</th>
      <th>Action</th>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($req)){
         $ird=$arr['blog_id']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);
      ?>
    <tr>
      <td><?php echo $arr['id']?></td>
      <td><img class="imtd" src="../post/<?php echo $arr['photos1']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr['photos2']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr['photos3']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><img class="imtd" src="../post/<?php echo $arr['photos4']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr['blog_id'].')'?></a></td>

      <td><?php echo $arr['blog_head']?></td>
      <td><?php echo $arr['blog_dtl']?></td>
      <td><?php echo $arr['time']?></td>
      <td><?php echo $arr['ip']?></td>
      <td><a href="blogtrash.php?action=del&id=<?php echo base64_encode($arr['id'])?>" style="color: red"><p>Delete</p></a><br><a href="blogtrash.php?action=repo&i=<?php echo base64_encode($arr['id'])?>" style="color: #006C06FF">Report</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr['id'])?>"><p>view</p></a></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
</div>
</body>
</html>
			