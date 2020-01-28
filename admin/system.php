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
	$query="select * from system_info ORDER BY id DESC";
	$req=mysqli_query($con,$query);
	
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
			<h3><a href="userdash.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>contact by  User</h3>

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
           header('location:system.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from system_info where (system_os like '%" . str_replace( ' ', '%\' AND system_os LIKE \'%', $getresult ) . '%\')
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')   
         OR (system_conf like' ."'".'%'. str_replace( ' ', '%\' AND system_conf LIKE \'%', $getresult ) . '%\')
         OR (browser like' ."'".'%'. str_replace( ' ', '%\' AND  browser LIKE \'%', $getresult ) . '%\')
         OR (u_id like' ."'".'%'. str_replace( ' ', '%\' AND u_id LIKE \'%', $getresult ) . '%\')
         OR (time like' ."'".'%'. str_replace( ' ', '%\' AND time LIKE \'%', $getresult ) . '%\')
         OR (ip like' ."'".'%'. str_replace( ' ', '%\' AND ip LIKE \'%', $getresult ) . '%\')
         OR (page like' ."'".'%'. str_replace( ' ', '%\' AND page LIKE \'%', $getresult ) . '%\')';

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
      <th>photos</th>
      <th>system_os</th>
      <th>system_conf</th>
      <th>browser</th>
      <th>user id</th>
      <th>time</th>
      <th>ip</th>
      <th>On page</th>
    </tr>
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['u_id']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);

          ?>

					<tr>
      <td><?php echo $arr_profile['id']?></td>
      <td><img src="../<?php echo $arr_profile['logo']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><?php echo $arr_profile['system_os']?></td>
      <td><?php echo $arr_profile['system_conf']?></td>
      <td><?php echo $arr_profile['browser']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr_profile['u_id'].')'?></a></td>
      <td><?php echo date("y-m-d-H:i:s",$arr_profile['time'])?></td>
      <td><?php echo $arr_profile['ip']?></td>
      <td><?php echo $arr_profile['page']?></td>
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
      <th>photos</th>
      <th>system_os</th>
      <th>system_conf</th>
      <th>browser</th>
      <th>u_id</th>
      <th>time</th>
      <th>ip</th>
    <th>On Page</th>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($req)){  
           $ird=$arr['u_id']; 
         $sq11="select * from user_login where id='$ird'";
         $re11=mysqli_query($con,$sq11);
         $getdata=mysqli_fetch_assoc($re11);
      ?>
    <tr>
     <td><?php echo $arr['id']?></td>
       <td><img src="../<?php echo $arr['logo']?>" alt=""  style="width: 50px;height:50px ;border-radius: 50%;" ></td>
      <td><?php echo $arr['system_os']?></td>
      <td><?php echo $arr['system_conf']?></td>
      <td><?php echo $arr['browser']?></td>
      <td><a href="userview.php?iv=<?php echo $getdata['username']?>"><?php echo $getdata['name'].'&nbsp'.$getdata['last_name'].'&nbsp('.$arr['u_id'].')'?></a></td>
      <td><?php echo date("y-m-d-H:i:s",$arr['time'])?></td>
      <td><?php echo $arr['ip']?></td>
     <td><?php echo $arr['page']?></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
</div>
</body>
</html>
			