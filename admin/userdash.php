<?php
require('core.php'); //access the current path
require('connection.php'); //creat a cunnection for data base
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		
require('slice/header.php');
	require('slice/sidebar.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">abbr[title] {
  border-bottom: none !important;
  cursor: inherit !important;
  text-decoration: none !important;
}</style>
	</head>
	<body>

		<div class="dashboard-box">
			<abbr title="Update Page" ><a href="frontend-update.php"><div class="add-hdft"><img src="photos/update1.png">
			</div></a></abbr>
			<!-- end of add user icon in div  -->
<!--==============================================================================-->			<?php //for Report count
			$query6="select * from user_login";
	                $req6=mysqli_query($con,$query6); 
	                 $getcont6=mysqli_num_rows($req6);
	                $guser=mysqli_num_rows($req6);
	                if ($getcont6<=999) {
	                	 $getcont6;
	                } else if ($getcont6>=999 && $getcont6<=999999 ) {
	                	 $getcont6=round($getcont6/1000,2) .'k';

	                } else if ($getcont6>=999999 && $getcont6<=999999999 ) {
	                	 $getcont6=round($getcont6/1000000,2) .'m';

	                } else if ($getcont6>=999999999 && $getcont6<=999999999999 ) {
	                	 $getcont6=round($getcont6/1000000000,2) .'b';

	                } else if ($getcont6>=999999999999 ) {
	                	 $getcont6='t+';

	                }
	?>
			<abbr title="user list" ><a href="userview.php"><div class="add-hdft" style="left:30%;"><img src="photos/user1.png" style="margin-top: 4%;">
				<abbr title="<?php echo $guser;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont6 ;?></label></abbr>
			</div></a></abbr>
			<!-- end of add user icon in div  -->
<!--==============================================================================-->			<?php //for Blog count
			$query5="select * from user_post";
	                $req5=mysqli_query($con,$query5); 
	                 $getcont5=mysqli_num_rows($req5);
	                   $gblog=mysqli_num_rows($req5);
	                if ($getcont5<=999) {
	                	 $getcont5;
	                } else if ($getcont5>=999 && $getcont5<=999999 ) {
	                	 $getcont5=round($getcont5/1000,2) .'k';

	                } else if ($getcont5>=999999 && $getcont5<=999999999 ) {
	                	 $getcont5=round($getcont5/1000000,2) .'m';

	                } else if ($getcont5>=999999999 && $getcont5<=999999999999 ) {
	                	 $getcont5=round($getcont5/1000000000,2) .'b';

	                } else if ($getcont5>=999999999999 ) {
	                	 $getcont5='t+';

	                }
	?>
			<abbr title="user blog" ><a href="userblog.php"><div class="add-hdft" style="left:52%;"><img src="photos/blog.png" style="margin-top: 4%;">
				<abbr title="<?php echo $gblog;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont5 ;?></label></abbr>
			</div></a></abbr>
<!--==============================================================================-->			<?php //for comments count
			$query4="select * from comments";
	                $req4=mysqli_query($con,$query4); 
	                 $getcont4=mysqli_num_rows($req4);
	                $gcomment=mysqli_num_rows($req4);
	                if ($getcont4<=999) {
	                	 $getcont4;
	                } else if ($getcont4>=999 && $getcont4<=999999 ) {
	                	 $getcont4=round($getcont4/1000,2) .'k';

	                } else if ($getcont4>=999999 && $getcont4<=999999999 ) {
	                	 $getcont4=round($getcont4/1000000,2) .'m';

	                } else if ($getcont4>=999999999 && $getcont4<=999999999999 ) {
	                	 $getcont4=round($getcont4/1000000000,2) .'b';

	                } else if ($getcont4>=999999999999 ) {
	                	 $getcont4='t+';

	                }
	?>
			<abbr title="user comment's" ><a href="comments.php"><div class="add-hdft" style="left:72%;"><img src="photos/comm1.png">
				<abbr title="<?php echo $gcomment;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont4 ;?></label></abbr>
			</div></a></abbr>
<!--==============================================================================-->
         
         <?php //for like count
			$query3="select * from likes";
	                $req3=mysqli_query($con,$query3); 
	                 $getcont3=mysqli_num_rows($req3);
	                $glike=mysqli_num_rows($req3);
	                if ($getcont3<=999) {
	                	 $getcont3;
	                } else if ($getcont3>999 && $getcont3<=999999 ) {
	                	 $getcont3=round($getcont3/1000,2) .'k';

	                } else if ($getcont3>999999 && $getcont3<=999999999 ) {
	                	 $getcont3=round($getcont3/1000000,2) .'m';

	                } else if ($getcont3>999999999 && $getcont3<=999999999999 ) {
	                	 $getcont3=round($getcont3/1000000000,2) .'b';

	                } else if ($getcont3>999999999999 ) {
	                	 $getcont3='t+';

	                }
	?>
			<abbr title="likes" ><a href="like.php"><div class="add-hdft" style="top:300px;"><img src="photos/like-512.png">
				<abbr title="<?php echo $glike;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont3 ;?></label></abbr>
			</div></a></abbr>
			<!-- end of add user icon in div  -->
<!--==============================================================================-->
			<?php //for Report count
			$query2="select * from report";
	                $req2=mysqli_query($con,$query2); 
	                $getcont2=mysqli_num_rows($req2);
	                $grepo=mysqli_num_rows($req2);
	                if ($getcont2<=999) {
	                	 $getcont2;
	                } else if ($getcont2>999 && $getcont2<=999999 ) {
	                	 $getcont2=round($getcont2/1000,2) .'k';

	                } else if ($getcont2>999999 && $getcont2<=999999999 ) {
	                	 $getcont2=round($getcont2/1000000,2) .'m';

	                } else if ($getcont2>999999999 && $getcont2<=999999999999 ) {
	                	 $getcont2=round($getcont2/1000000000,2) .'b';

	                } else if ($getcont2>999999999999 ) {
	                	 $getcont2='t+';

	                }
	?>
			<abbr title="Reported Blog" ><a href="report.php"><div class="add-hdft" style="left:30%;top:300px;"><img src="photos/repo1.png">
				<abbr title="<?php echo $grepo;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont2 ;?></label></abbr>
			</div></a></abbr>
<!--==============================================================================-->
			<!-- end of add user icon in div  -->
			<?php $query="select * from contact ORDER BY id DESC";
	                $req=mysqli_query($con,$query); 
	                 $getcont=mysqli_num_rows($req);
	                 $gcont=mysqli_num_rows($req);
	                if ($getcont<=9999) {
	                	 $getcont;
	                } else{  $getcont="9999+";}
	?>
			<abbr title="contact by" ><a href="contact.php"><div class="add-hdft" style="left:52%;top:300px;"><img src="photos/cont1.png">
				<abbr title="<?php echo $gcont;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont ;?></label></abbr>
			</div></a></abbr>
<!--==============================================================================-->			
			<?php //for system count
			$query1="select * from system_info";
	                $req1=mysqli_query($con,$query1); 
	                $sy1=mysqli_num_rows($req1);
	                 $getcont1=mysqli_num_rows($req1);
	                if ($getcont1<=999) {
	                	 $getcont1;
	                } else if ($getcont1>999 && $getcont1<=999999 ) {
	                	 $getcont1=round($getcont1/1000,2) .'k';

	                } else if ($getcont1>999999 && $getcont1<=999999999 ) {
	                	 $getcont1=round($getcont1/1000000,2) .'m';

	                } else if ($getcont1>999999999 && $getcont1<=999999999999 ) {
	                	 $getcont1=round($getcont1/1000000000,2) .'b';

	                } else if ($getcont1>999999999999 ) {
	                	 $getcont1='t+';

	                }
	?>
			<abbr title="system informetion" ><a href="system.php"><div class="add-hdft" style="left:72%;top:300px;">
				<img src="photos/snfo1.png"><abbr title="<?php echo $sy1;?>" ><label style="margin-left: 70%;font-size: 15px;background-color:#FF00006A;padding: 5px;"><?php echo $getcont1 ;?></label></abbr>
			</div></a></abbr>
		</div>
		<!-- end of dashboard-box container div  -->
	</body>
</html>
<?php
require('slice/footer.php');
}
else
{
header('location:index.php');
}
?>