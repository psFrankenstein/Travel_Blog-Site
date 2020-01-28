<?php
require('core.php');
	require("connection.php");
	require('slice/header.php');
	require('slice/sidebar.php');
	require('slice/footer.php');//add the requere page here
	
	if(!isset($_SESSION['id']))
{
	header("location:index.php");
	
}
?>
<?php
	
	if(isset($_REQUEST['save']))
	{
				
		$date= $_REQUEST['date'];
		$day = $_REQUEST['day'];
		$Important = $_REQUEST['Important'];
		
	echo $sql = "insert into Important (date,day,Important) values('$date','$day','$Important')";
	mysqli_query($con,$sql);
	
	 header("location:impor.php");
	}
	
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title></title>
		</head>
		<body class="bd">
			 <div class="row">
				        <h3><a href="impor.php"><abbr title="Back"><img src="photos/backbutton.png"></abbr></a>*Add Important Notice</h3>
				      <div class="form-group">
					                <form role="form" action="" method="post" enctype="multipart/form-data">
						 <div class="form-group">
						<label>Date</label>
	  <input class="form-control" name="date" type="number" placeholder="Enter date" value="" id="firstname"> </div>
						  
						  <div class="form-group">
				 <label>Month</label>
				 <input type="number" class="form-control" name="day" placeholder="Enter month" value="" id="lastname"></div>
						  
						  <div class="form-group">
			 <label>Notice</label>
				<textarea class="form-control" name="Important" placeholder="Enter Notice" value="" id="username"></textarea>
							                    
						                  </div>
						                  <br>
						                
						                  <button type="reset" class="btn-btn-default">Reset Button</button>
						                  <button type="submit" name="save" class="btn-btn-default">Submit Button</button>
					                </form>
				                     </div>
			            </div>
			         
		</body>
	</html>