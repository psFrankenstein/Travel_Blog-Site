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
	$query="select * from  report ORDER BY id DESC";
	$req=mysqli_query($con,$query);

	if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
	{
		$idd = $_REQUEST['id'];
		$id = base64_decode($idd);
		
		$sql = "delete from report where id='$id'";
		mysqli_query($con,$sql);
		
			header("location:report.php");
	}

	if(isset($_REQUEST['action']) && $_REQUEST['action']=="repo")
	{
		$iddk = $_REQUEST['i'];
		$idk = base64_decode($iddk);
		$query="select * from  report where id='$idk'";
	    $req=mysqli_query($con,$query);
	    $getadmd=mysqli_fetch_assoc($req);
	    $us=$getadmd['user_id'];
	    $getblo=$getadmd['post_id'];
          $timerepo=time();
		echo $sqlreport="insert into report(user_id,post_id,who,time,admin) values('$us','$getblo','0','$timerepo','YES')";
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
		</style>
	</head>
	<body  class="bd">
		<div class="view" >
			
			<h3><a href="userdash.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Blog Report by  User</h3>

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
           header('location:report.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from report where (user_id like '%" . str_replace( ' ', '%\' AND user_id LIKE \'%', $getresult ) . '%\')
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')   
         OR (post_id like' ."'".'%'. str_replace( ' ', '%\' AND post_id LIKE \'%', $getresult ) . '%\')
         OR (time like' ."'".'%'. str_replace( ' ', '%\' AND time LIKE \'%', $getresult ) . '%\')
         OR (who like' ."'".'%'. str_replace( ' ', '%\' AND who LIKE \'%', $getresult ) . '%\')
         OR (admin like' ."'".'%'. str_replace( ' ', '%\' AND admin LIKE \'%', $getresult ) . '%\')';

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
      <th>Blog by</th>
      <th>Blog_id</th>
      <th>Created_time</th>
      <th>Who report</th>
      <th>Admin</th>
      <th>Action</th>
    </tr>
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['user_id']; 
          $ird1=$arr_profile['who']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);

        $sq111="select * from user_login where id='$ird1'";
        $re111=mysqli_query($con,$sq111);
        $getdata1=mysqli_fetch_assoc($re111);
          ?>

					<tr>
      <td><?php echo $arr_profile['id']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr_profile['user_id'].')'?></td>
      <td><a href="userblog.php?iv=<?php echo $arr_profile['post_id']?>"><?php echo $arr_profile['post_id']?></a></td>
      <td><?php echo date("y-m-d~H:i:s",$arr_profile['time'])?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata1['name'].'&nbsp'.$getdata1['last_name'].'&nbsp('.$arr_profile['who'].')'?></a></td>
      <td><?php echo $arr_profile['admin']?></td>
      <td ><a href="report.php?action=del&id=<?php echo base64_encode($arr_profile['id'])?>" style="color: red">Delete</a><br><a href="report.php?action=repo&i=<?php echo base64_encode($arr_profile['id'])?>" style="color: #006C06FF">Report</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr_profile['post_id'])?>">view</a></td>
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
      <th>Blog by</th>
      <th>Blog_id</th>
      <th>Created_time</th>
      <th>Who report</th>
      <th>Admin</th>
      <th>Action</th>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($req)){   
         $ird=$arr['user_id']; 
          $ird1=$arr['who']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);

        $sq111="select * from user_login where id='$ird1'";
        $re111=mysqli_query($con,$sq111);
        $getdata1=mysqli_fetch_assoc($re111);
      ?>
    <tr>
     <td><?php echo $arr['id']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr['user_id'].')'?></a></td>
      <td><a href="userblog.php?iv=<?php echo $arr['post_id']?>"><?php echo $arr['post_id']?></a></td>
      <td><?php echo date("y-m-d~H:i:s",$arr['time'])?></td>
      <td><a href="userview.php?iv=<?php echo $getdata1['username']?>"><?php echo $getdata1['name'].'&nbsp'.$getdata1['last_name'].'&nbsp('.$arr['who'].')'?></a></td>
      <td><?php echo $arr['admin']?></td>
      <td ><a href="report.php?action=del&id=<?php echo base64_encode($arr['id'])?>" style="color: red">Delete</a><br><a href="report.php?action=repo&i=<?php echo base64_encode($arr['id'])?>" style="color: #006C06FF">Report</a><br><a href="userblogview.php?id=<?php echo base64_encode($arr['post_id'])?>">view</a></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
</div>
</body>
</html>
			