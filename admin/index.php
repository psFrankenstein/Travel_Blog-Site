<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		
    require('slice/header.php');
	require('slice/sidebar.php');
	require('dashboard.php');
    require('slice/footer.php');
$id=$_SESSION['id']['id']; //code for number of time loged in by admin or user
	$quer="select * from admin where id = '$id'";
	$req=mysqli_query($con,$quer);
	$get=$_SESSION['id']['activ_time'];
		$c=$get+1;
     
		$time=time();
		$current_date=date('D,M,Y - H:i:s');
		$current_date;
			$query="update admin set  	activ_time='$c',last_seen='$current_date' where id = '$id'";
		mysqli_query($con,$query);

}
else
{
require('login.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>index</title>
	</head>
	<body bgcolor="">
		<h1></h1>
	</body>
</html>