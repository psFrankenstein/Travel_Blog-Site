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
	$query="select * from  user_login ORDER BY id DESC";
	$req=mysqli_query($con,$query);
	
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="del")
	{
		$idd = $_REQUEST['id'];
		$id = base64_decode($idd);
		
		$sql = "delete from user_login where id='$id'";
		mysqli_query($con,$sql);
		
			header("location:userview.php");
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
overflow: hidden;
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
			<h3><a href="userdash.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>Register User's Of The Page</h3>

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
           header('location:userview.php?iv='.$search);
  }
  else {
 // echo  "<script>alert('Please enter a search query');</script>";
  }
?>
   <?php 
         if(isset($_REQUEST['iv'])){ $getresult=$_REQUEST['iv'] ; 
   $sql_profile="select * from user_login where (name like '%" . str_replace( ' ', '%\' AND name LIKE \'%', $getresult ) . '%\') 
         OR (id=' ."'". str_replace( ' ', '\' AND id='."'", $getresult )."'".')
         OR (last_name like' ."'".'%'. str_replace( ' ', '%\' AND last_name LIKE \'%', $getresult ) . '%\')
         OR (username=' ."'". str_replace( ' ', '\' AND username='."'", $getresult )."'".')
         OR (email=' ."'". str_replace( ' ', '\' AND email='."'", $getresult ) ."'".') 
         OR (name like' ."'".'%'. str_replace( ' ', '%\' AND last_name LIKE \'%', $getresult ) . '%\') 
         OR (country like' ."'".'%'. str_replace( ' ', '%\' AND country LIKE \'%', $getresult ) . '%\') OR (country LIKE '."'%".$getresult."%'".') 
         OR (gender like' ."'".'%'. str_replace( ' ', '%\' AND gender LIKE \'%', $getresult ) . '%\')
         OR (login_time like' ."'".'%'. str_replace( ' ', '%\' AND login_time LIKE \'%', $getresult ) . '%\')
         OR (work like' ."'".'%'. str_replace( ' ', '%\' AND work LIKE \'%', $getresult ) . '%\') 
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
						<th >Photo</th>
						<th >First Name</th>
						<th >Last name</th>
						<th  >Gender</th>
						<th  >Username</th>

						<th  >Login Time</th>
						<th  >work</th>
						<th  >country</th>
						<th  >Birth Date</th>
						<th  >contact</th>
						<th  >login_attempt</th>
						<th  >last_seen</th>
						<th  >E-mail</th>
						<th  >Password</th>
						<th  >ip</th>

						
						<th>Action</th>
					</tr >
       <?php while( $arr_profile=mysqli_fetch_assoc($req_profile)){
          $ird=$arr_profile['id'];?>

					<tr >
						<td  ><?php echo $arr_profile['id']?></td>
						<td><img class="imtd" src="../<?php echo $arr_profile['p_photo']?>" style="width: 50px;height:50px ;border-radius: 50%;" ></td>
					<td><?php echo $arr_profile['name']?></td>
				<td><?php echo $arr_profile['last_name']?></td>
				<td><?php echo $arr_profile['gender']?></td>
				<td><?php echo $arr_profile['username']?></td>

				<td><?php echo $arr_profile['login_time']?></td>
				<td><?php echo $arr_profile['work']?></td>
				<td><?php echo $arr_profile['country']?></td>
				<td><?php echo $arr_profile['b_date'].'/'.$arr_profile['b_day'].'/'.$arr_profile['b_year']?></td>
				<td><?php echo $arr_profile['contact']?></td>
				<td><?php echo $arr_profile['login_attempt']?></td>
				<td><?php echo date("y-m-d-H:i:s",$arr_profile['last_seen'])?></td>


					<td><?php echo $arr_profile['email']?></td>
					<td><?php echo $arr_profile['password']?></td>
					<td><?php echo $arr_profile['ip']?></td>
					<td ><a href="userview.php?action=del&id=<?php echo base64_encode($arr_profile['id'])?>" style="color: red"> Delete</a></td>
				</tr>
				<!--admin view container end here -->
				<?php }?>
				</table>

            <?php }else{?>
			<!-- admin table view  start here -->
			<table id="customers" >
					<tr>
						<th> <div class="adm-table">ID No.</div></th>
						<th>Photo</th>
						<th>First Name</th>
						<th>Last name</th>
						<th>Gender</th>
						<th>Username</th>

						<th>Login Time</th>
						<th>work</th>
						<th>country</th>
						<th>Birth Date</th>
						<th>contact</th>
						<th>login_attempt</th>
						<th>last_seen</th>
						<th>E-mail</th>
						<th>Password</th>
						<th>ip</th>
						<th >Action</th>
			            </tr >
					<!-- table header for admin  end here -->
					<?php while($arr=mysqli_fetch_assoc($req)){?>
					<tr >
						<td><?php echo $arr['id']?></td>
						<td><img class="imtd" src="../<?php echo $arr['p_photo'];?>" style="width: 50px;height:50px ;border-radius: 50%;" ></td>
					<td  ><?php echo $arr['name']?></td>
				<td  ><?php echo $arr['last_name']?></td>
				<td  ><?php echo $arr['gender']?></td>
				<td  ><?php echo $arr['username']?></td>

				<td  ><?php echo $arr['login_time']?></td>
				<td  ><?php echo $arr['work']?></td>
				<td  ><?php echo $arr['country']?></td>
				<td  ><?php echo $arr['b_date'].'/'.$arr['b_day'].'/'.$arr['b_year']?></td>
				<td  ><?php echo $arr['contact']?></td>
				<td  ><?php echo $arr['login_attempt']?></td>
				<td  ><?php echo date("y-m-d-H:i:s",$arr['last_seen'])?></td>


					<td  ><?php echo $arr['email']?></td>
					<td  ><?php echo $arr['password']?></td>
					<td  ><?php echo $arr['ip']?></td>
					<td ><a href="userview.php?action=del&id=<?php echo base64_encode($arr['id'])?>" style="color: red">Delete</a></td>
				</tr>
				<!--admin view container end here -->
				<?php }?>
				
			</table>
			<?php }?>