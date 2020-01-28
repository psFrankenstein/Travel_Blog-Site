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
	$query="select * from Important ORDER BY id DESC";
	$req=mysqli_query($con,$query);
  if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
  {
    $idd = $_REQUEST['id'];
    $id = base64_decode($idd);
    
    $sql = "delete from Important where id='$id'";
    mysqli_query($con,$sql);
    
      header("location:impor.php");
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
			<h3>Notice For  User <a href="addimpro.php"><button style="position: absolute;left: 90%;" > Add More</button></a></label></h3>

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
           header('location:impor.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from Important where (Important like '%" . str_replace( ' ', '%\' AND Important LIKE \'%', $getresult ) . '%\') 
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')
         OR (date=' ."'". str_replace( ' ', '\' AND date='."'", $getresult )."'".')
         OR (day=' ."'". str_replace( ' ', '\' AND day='."'", $getresult )."'".')
         OR (date=' ."'". str_replace( ' ', '\' AND day='."'", $getresult )."'".')  
         OR (time like' ."'".'%'. str_replace( ' ', '%\' AND time LIKE \'%', $getresult ) . '%\')';

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
      <th>Day</th>
      <th> Month</th>
       <th> Importent</th>
       <th>upload time</th>
      <th>Action</th>
    </tr>
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['id'];?>

					<tr>
      <td><?php echo $arr_profile['id']?></td>
      <td><?php echo $arr_profile['date']?></td>
      <td><?php echo $arr_profile['day']?></td>
      <td><?php echo $arr_profile['Important']?></td>
      <td><?php echo $arr_profile['time']?></td>
      <td ><a href="impor.php?action=del&id=<?php echo base64_encode($arr_profile['id'])?>" style="color: red">Delete</a></td>
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
      <th>Day</th>
      <th> Month</th>
       <th> Importent</th>
       <th>Upload time</th>
      <th>Action</th>
    
    </tr>
    <?php while($arr=mysqli_fetch_assoc($req)){?>
    <tr>
     <td><?php echo $arr['id']?></td>
      <td><?php echo $arr['date']?></td>
      <td><?php echo $arr['day']?></td>
      <td><?php echo $arr['Important']?></td>
      <td><?php echo $arr['time']?></td>
      <td ><a href="impor.php?action=del&id=<?php echo base64_encode($arr['id'])?>" style="color: red">Delete</a></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
</div>
</body>
</html>
			